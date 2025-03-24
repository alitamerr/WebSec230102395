<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>{{ $product->name }}</h1>
        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100%;">
        <p>Price: ${{ number_format($product->price, 2) }}</p>
        <p>Description: {{ $product->description }}</p>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back to list</a>
    </div>
</body>
</html>
