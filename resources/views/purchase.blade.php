<!-- resources/views/purchase.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPurchaseModal">
    Purchase
</button>
<a href="{{ route('vendors.index') }}" class="btn btn-primary">Vendors</a>

<div class="modal fade" id="addPurchaseModal" tabindex="-1" aria-labelledby="addPurchaseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPurchaseModalLabel">Add Purchase Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>




    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf
        <div class="modal-body">
        <div class="form-group">
            <label for="product_id">Product Name:</label>
            <select name="product_id" id="product_id" class="form-control">
                <option value="">Select Product</option>
                @foreach($products as $product)
    <option value="{{ $product->id }}" 
            data-code="{{ $product->productcode }}" 
            data-color="{{ $product->color }}" 
            data-fabric="{{ $product->fabric }}">{{ $product->productname }}</option>
    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="productcode">Code:</label>
            <input type="text" name="productcode" id="productcode" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="color">Colour:</label>
            <input type="text" name="color" id="color" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="fabric">Fabric type:</label>
            <input type="text" name="fabric" id="fabric" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="date_of_purchase">Date of purchase:</label>
            <input type="date" name="date_of_purchase" id="date_of_purchase" class="form-control">
        </div>

        <div class="form-group">
            <label for="purchased_qty">Purchased Qty (meter):</label>
            <input type="number" name="purchased_qty" id="purchased_qty" class="form-control" min="0">
        </div>

        <div class="form-group">
            <label for="rate_per_meter">Rate per meter:</label>
            <input type="number" name="rate_per_meter" id="rate_per_meter" class="form-control" min="0">
        </div>

        <div class="form-group">
            <label for="total_cost">Total Cost:</label>
            <input type="text" name="total_cost" id="total_cost" class="form-control" readonly>
        </div>

        <!-- <div class="form-group">
            <label for="vendor_name">Name of Vendor:</label>
            <input type="text" name="vendor_name" id="vendor_name" class="form-control">
        </div> -->
        <div class="form-group">
                    <label for="vendor_name">Vendor Name:</label>
                    <select name="vendor_name" id="vendor_name" class="form-control">
                        <option value="">Select Vendor</option>
                        @foreach($vendors as $vendor)
                            <option value="{{ $vendor->name }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>

        <button type="submit" class="btn btn-primary">Submit</button>
</div>
    </form>
</div>

</div>
    
</div>

<div class="mt-4">
        <h2>Purchase History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Date of Purchase</th>
                    <th>Purchased Qty</th>
                    <th>Rate per Meter</th>
                    <th>Total Cost</th>
                    <th>Vendor Name</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through purchase data and display rows -->
                @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->product->productname }}</td>
                    <td>{{ $purchase->date_of_purchase }}</td>
                    <td>{{ $purchase->purchased_qty }}</td>
                    <td>{{ $purchase->rate_per_meter }}</td>
                    <td>{{ $purchase->total_cost }}</td>
                    <td>{{ $purchase->vendor_name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    var productDropdown = document.getElementById('product_id');
    var productCodeInput = document.getElementById('productcode');
    var productColorInput = document.getElementById('color');
    var productFabricInput = document.getElementById('fabric');

    productDropdown.addEventListener('change', function () {
        var selectedOption = productDropdown.options[productDropdown.selectedIndex];
        productCodeInput.value = selectedOption.dataset.code;
        productColorInput.value = selectedOption.dataset.color;
        productFabricInput.value = selectedOption.dataset.fabric;
    });
});


    $(document).ready(function() {
        // $('#product_id').change(function() {
        //     var selectedOption = $(this).find(':selected');
        //     $('#productcode').val(selectedOption.data('code'));
        //     $('#color').val(selectedOption.data('color'));
        //     $('#fabric').val(selectedOption.data('fabric'));
        // });

        $('#purchased_qty, #rate_per_meter').keyup(function() {
            var purchasedQty = parseFloat($('#purchased_qty').val()) || 0;
            var ratePerMeter = parseFloat($('#rate_per_meter').val()) || 0;
            var totalCost = purchasedQty * ratePerMeter;
            $('#total_cost').val(totalCost.toFixed(2));
        });
    });
</script>

@endsection
