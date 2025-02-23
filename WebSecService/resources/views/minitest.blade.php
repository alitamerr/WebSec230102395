<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiniTest - Supermarket Bill</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    @extends('layouts.master')

    @section('title', 'Supermarket Bill')

    @section('content')
    <div class="card m-4">
        <div class="card-header">Supermarket Bill</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price ($)</th>
                        <th>Total ($)</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach ($bill as $item)
                        @php $subtotal = $item['quantity'] * $item['price']; @endphp
                        <tr>
                            <td>{{ $item['item'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price'], 2) }}</td>
                            <td>{{ number_format($subtotal, 2) }}</td>
                        </tr>
                        @php $total += $subtotal; @endphp
                    @endforeach
                    <tr class="table-info">
                        <td colspan="3"><strong>Total Amount</strong></td>
                        <td><strong>${{ number_format($total, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
