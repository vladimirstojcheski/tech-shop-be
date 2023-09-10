<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
<h1>Order Details</h1>

<p>Thank you for your order. Your order details are as follows:</p>

<ul>
    <li>Order Number: {{ $order->order_number }}</li>
    <li>Total price: {{ $order->total_amount }}$</li>
    <li>Number of products: {{ sizeof($order->products) }}</li>
</ul>

<p>You can view your order by clicking on the following link:</p>

<a href="{{ $frontendHost . '/order/' . $order->id }}">View Order Details</a>
</body>
</html>
