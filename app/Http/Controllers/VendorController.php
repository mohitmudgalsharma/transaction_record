<?php

namespace App\Http\Controllers;
use App\Models\Vendor;
use App\Models\Purchase;
use Illuminate\Http\Request;

class VendorController extends Controller
{

    public function index()
    {
        
        $vendors = Vendor::all();
        return view('vendors.index', compact('vendors'));
    }
    public function create()
    {
        return view('vendors.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:vendors',
        ]);

        Vendor::create($validatedData);

        return redirect()->route('vendors.index')->with('success', 'Vendor created successfully!');
    }
}