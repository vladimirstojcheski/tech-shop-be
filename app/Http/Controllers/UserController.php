<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);//login, register methods won't go through the api guard
    }

    public function getUserProfile()
    {
        $userAuth = auth()->user();
        $user = User::where('id', $userAuth['id'])->with('orders')->get()->first();
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request)
    {
        $userAuth = auth()->user();
        $user = User::find($userAuth['id']);
        $validatedData = $request->validate([
            'country' => 'nullable|string',
            'city' => 'nullable|string',
            'street_name' => 'nullable|string',
            'zip' => 'nullable|string',
            'phone_number' => 'nullable|string',
        ]);

        $user->update($validatedData);

        return response()->json([
            'message' => 'User successfully updated'
        ], 200);
    }
}
