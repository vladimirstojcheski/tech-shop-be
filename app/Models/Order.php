<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'country',
        'city',
        'street_name',
        'zip_code',
        'order_number',
        'total_amount',
        // Add other columns as needed
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'unit_price');;
    }

    public static function generateUniqueOrderNumber()
    {
        // Generate a unique order number
        $orderNumber = 'ORD' . now()->format('YmdHis') . Str::random(4);

        // Check if the order number already exists
        while (static::where('order_number', $orderNumber)->exists()) {
            $orderNumber = 'ORD' . now()->format('YmdHis') . Str::random(4);
        }

        return $orderNumber;
    }
}
