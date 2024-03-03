<!-- resources/views/sales.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <h2>Add New Sale</h2>
        <form method="POST" action="{{ route('sales.store') }}">
            @csrf
            <div class="form-group">
                <label for="product_id">Product:</label>
                <select class="form-control" id="product_id" name="product_id">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->productname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
    <label for="product_id">Products:</label>
    <select class="form-control" id="product_id" name="product_id">
        @foreach($stock as $product)
            <option value="{{ $product['product_id'] }}">
                {{ $product['product_name'] }} ({{ $product['vendor'] }})
            </option>
        @endforeach
    </select>
</div>
            <div class="form-group">
                <label for="vendor_name">Vendor:</label>
                <input type="text" class="form-control" id="vendor_name" name="vendor_name">
            </div>
            <div class="form-group">
                <label for="total_qty">Total Qty:</label>
                <input type="text" class="form-control" id="total_qty" name="total_qty" readonly>
            </div>
            <div class="form-group">
                <label for="qty_sold">Qty Sold:</label>
                <input type="number" class="form-control" id="qty_sold" name="qty_sold">
            </div>
            <div class="form-group">
                <label for="selling_price">Selling Price:</label>
                <input type="number" step="0.01" class="form-control" id="selling_price" name="selling_price">
            </div>
            <div class="form-group">
                <label for="date_sold">Date Sold:</label>
                <input type="date" class="form-control" id="date_sold" name="date_sold">
            </div>
            <div class="form-group">
                <label for="sold_to">Sold To:</label>
                <input type="text" class="form-control" id="sold_to" name="sold_to">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
