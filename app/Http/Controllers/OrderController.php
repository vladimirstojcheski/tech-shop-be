<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request)
    {

        $uniqueOrderNumber = Order::generateUniqueOrderNumber();
        // Validate the request data
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'streetName' => 'required|string',
            'zip_code' => 'required|string',
            'total_amount' => 'required|string',
            'products' => 'required|array',
        ]);

        // Create a new order including the delivery address
        $order = Order::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'email' => $validatedData['email'],
            'phone_number' => $validatedData['phone'],
            'country' => $validatedData['country'],
            'city' => $validatedData['city'],
            'street_name' => $validatedData['streetName'],
            'zip_code' => $validatedData['zip_code'],
            'total_amount' => $validatedData['total_amount'],
            'order_number' => $uniqueOrderNumber
        ]);

        $quantity = 5;
        $unitPrice = 10.99;
        // Attach products to the order (assuming you have an array of product IDs)
        $order->products()->attach($validatedData['products'], ['quantity' => $quantity,
            'unit_price' => $unitPrice,]);

        return response()->json(['message' => 'Order created successfully'], 201);
    }

    public function getOrderWithProducts($orderId)
    {
        // Load the order with the products relationship
        $order = Order::with('products')->find($orderId);

        // If the order does not exist, return an error response or handle it as needed
        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Now, you can access the order and its related products
        return response()->json(['order' => $order], 200);
    }
}
