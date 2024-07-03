<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
    <style>
        .product {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .product img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
        }

        .product a {
            text-decoration: none;
            font-size: 20px;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Products</h1>
    <ul>
        @foreach ($products as $product)
        <li class="product">
            <img src="images/-10309909.jpg" alt="{{ $product->name }}">
            <div>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                - ${{ $product->price }}
            </div>
        </li>
        @endforeach
    </ul>
</body>

</html>