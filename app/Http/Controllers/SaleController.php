<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    // public function index()
    // {
    //     return view('sales.index', compact('products'));
    // }

    // public function create()
    // {
    //     $stock = [];
    //     $products = Product::all();
    //     return view('sales.create', compact('products','stock'));
    // }




    public function create()
{
    $stock = [];

    // Fetch all products
    $products = Product::all();

    // Iterate through each product to get its purchases
    foreach ($products as $product) {
        // Retrieve all purchases for the current product grouped by vendor
        $purchases = Purchase::where('product_id', $product->id)
            ->groupBy('vendor_name')
            ->selectRaw('vendor_name, sum(purchased_qty) as total_qty')
            ->get();

        // Add the product name and its associated purchases to the stock array
        foreach ($purchases as $purchase) {
            $stock[] = [
                'product_id' => $product->id,
                'product_name' => $product->productname . '-' . $purchase->vendor_name,
                // 'vendor' => $purchase->vendor_name,
                'total_qty' => $purchase->total_qty,
            ];
        }
    }

    return view('sales.create', compact('products', 'stock'));
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty_sold' => 'required|integer|min:1',
            'selling_price' => 'required|numeric|min:0',
            'date_sold' => 'required|date',
            'sold_to' => 'required|string|max:255',
        ]);

        // Calculate total stock for the product with vendor
        $product = Product::findOrFail($validatedData['product_id']);
        $purchases = Purchase::where('product_id', $product->id)
            ->groupBy('vendor_name')
            ->selectRaw('vendor_name, sum(purchased_qty) as total_qty')
            ->get();

        $total_qty = 0;
        foreach ($purchases as $purchase) {
            $total_qty += $purchase->total_qty;
        }

        // Check if enough stock is available
        if ($total_qty < $validatedData['qty_sold']) {
            return redirect()->back()->with('error', 'Insufficient stock.');
        }

        // Create a new sale record
        Sale::create([
            'product_id' => $validatedData['product_id'],
            // 'vendor' => $product->vendor,
            'total_qty' => $total_qty,
            'qty_sold' => $validatedData['qty_sold'],
            'selling_price' => $validatedData['selling_price'],
            'date_sold' => $validatedData['date_sold'],
            'sold_to' => $validatedData['sold_to'],
        ]);

        // Update the stock
        // You need to implement the logic to update the stock based on the sale

        return redirect()->back()->with('success', 'Sale recorded successfully.');
    }
}

