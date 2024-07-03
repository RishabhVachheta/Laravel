<!-- resources/views/cart/index.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
</head>

<body>
    <h1>Cart</h1>
    <ul>
        @foreach ($cartItems as $item)
        <li>
            {{ $item->product->name }} - Quantity: {{ $item->quantity }}
        </li>
        @endforeach
    </ul>
    <a href="/">product</a>
</body>

</html>