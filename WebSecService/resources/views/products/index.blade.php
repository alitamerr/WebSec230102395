<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
    <div class="container mt-4">
        <h1>Product List</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New Product</a>
        <div class="list-group mt-3">
            @foreach ($products as $product)
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{ $product->name }}</h5>
                        <p>${{ number_format($product->price, 2) }}</p>
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="width: 100px; height: auto;">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
