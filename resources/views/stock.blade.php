@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Stock</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Vendor</th>
                <th>Total Purchased Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock as $product)
                @foreach($product['purchases'] as $purchase)
                <tr>
                    @if ($loop->first)
                    <td rowspan="{{ count($product['purchases']) }}">{{ $product['product_name'] }}</td>
                    @endif
                    <td>{{ $purchase->vendor_name }}</td>
                    <td>{{ $purchase->total_qty }}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
