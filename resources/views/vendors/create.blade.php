<!-- resources/views/vendors/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Vendor</h2>
    
    <form action="{{ route('vendors.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Vendor Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number:</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
