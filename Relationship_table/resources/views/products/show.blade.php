<!-- resources/views/products/show.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>{{ $product->name }}</title>
</head>

<body>
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>${{ $product->price }}</p>
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="number" name="quantity" value="1">
        <button type="submit">Add to Cart</button>
    </form>
</body>

</html>