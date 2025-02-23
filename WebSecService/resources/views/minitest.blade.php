@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Supermarket Bill</h2>
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
@endsection
