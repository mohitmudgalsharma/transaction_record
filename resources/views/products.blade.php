@extends('layouts.app')

@section('content')



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    
</head>
<body> -->
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
    Add Product
</button>
<a href="{{ route('purchase.index') }}" class="btn btn-primary">Purchase</a>
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('products.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productname" required>
                    </div>
                    <div class="mb-3">
                        <label for="productCode" class="form-label">Product Code</label>
                        <input type="text" class="form-control" id="productCode" name="productcode" required>
                    </div>
                    <div class="mb-3">
                        <label for="productColor" class="form-label">Color</label>
                        <input type="text" class="form-control" id="productColor" name="color">
                    </div>
                    <div class="mb-3">
                        <label for="productFabric" class="form-label">Fabric</label>
                        <input type="text" class="form-control" id="productFabric" name="fabric">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Color</th>
                <th>Fabric</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->productname }}</td>
                <td>{{ $product->productcode }}</td>
                <td>{{ $product->color }}</td>
                <td>{{ $product->fabric }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<!-- Bootstrap JavaScript -->
@endsection
