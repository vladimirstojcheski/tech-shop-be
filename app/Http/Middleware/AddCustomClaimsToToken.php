<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Illuminate\Http\Request;

class AddCustomClaimsToToken
{

    public function handle(Request $request, Closure $next)
    {
//        $user = auth()->user();
//
//        // Add custom claims to the token payload
//        $customClaims = [
////            'roles' => $user->roles->pluck('name')->toArray(),
//            'username' => $user->email,
//        ];
//
//        JWTAuth::factory()->claims($customClaims);
        return $next($request);
    }
}
