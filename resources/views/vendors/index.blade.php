<!-- resources/views/vendors/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Vendors</h2>
    <a href="{{ route('vendors.create') }}" class="btn btn-primary">Add Vendor</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Email</th>
                <!-- Add more table headers for additional vendor details if needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($vendors as $vendor)
            <tr>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->address }}</td>
                <td>{{ $vendor->phone_number }}</td>
                <td>{{ $vendor->email }}</td>
                <!-- Add more table cells for additional vendor details if needed -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
