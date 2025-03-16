<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    @extends('layouts.master')

    @section('title', 'Products')

    @section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Product Catalog</h2>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="{{ $product['image'] }}" class="card-img-top" alt="{{ $product['name'] }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">{{ $product['description'] }}</p>
                            <p class="card-text"><strong>${{ number_format($product['price'], 2) }}</strong></p>
                            <button class="btn btn-primary">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection
</body>
</html>
