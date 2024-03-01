<?php

namespace App\Http\Controllers;
use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $purchases = Purchase::all(); // Fetch all purchases for display
        return view('purchase', compact('products', 'purchases'));
        
        //
        // $products = Product::all();
        // return view('purchase', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $products = Product::all();
        // return view('purchase', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $validatedData = $request->validate([
        //     'product_id' => 'required',
        //     'date_of_purchase' => 'required|date',
        //     'purchased_qty' => 'required|numeric|min:0',
        //     'rate_per_meter' => 'required|numeric|min:0',
        //     'vendor_name' => 'required|string|max:255',
        // ]);

        
        // $total_cost = $request->purchased_qty * $request->rate_per_meter;

        
        // Purchase::create([
        //     'product_id' => $request->product_id,
        //     'date_of_purchase' => $request->date_of_purchase,
        //     'purchased_qty' => $request->purchased_qty,
        //     'rate_per_meter' => $request->rate_per_meter,
        //     'total_cost' => $total_cost,
        //     'vendor_name' => $request->vendor_name,
        // ]);

        // // Redirect back with success message
        // return redirect()->back()->with('success', 'Purchase created successfully!');
        $validatedData = $request->validate([
            'product_id' => 'required',
            'date_of_purchase' => 'required|date',
            'purchased_qty' => 'required|numeric|min:0',
            'rate_per_meter' => 'required|numeric|min:0',
            'vendor_name' => 'required|string|max:255',
        ]);

        // Calculate total cost
        $total_cost = $request->purchased_qty * $request->rate_per_meter;

        // Create a new Purchase instance
        Purchase::create([
            'product_id' => $request->product_id,
            'date_of_purchase' => $request->date_of_purchase,
            'purchased_qty' => $request->purchased_qty,
            'rate_per_meter' => $request->rate_per_meter,
            'total_cost' => $total_cost,
            'vendor_name' => $request->vendor_name,
        ]);

        // Redirect back with success message
        return redirect()->route('purchase.index')->with('success', 'Purchase created successfully!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
