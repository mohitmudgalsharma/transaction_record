<?php
namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();

        // Initialize an empty array to store stock information
        $stock = [];
    
        // Iterate through each product
        foreach ($products as $product) {
            // Retrieve all purchases for the current product grouped by vendor
            $purchases = Purchase::where('product_id', $product->id)
                ->groupBy('vendor_name')
                ->selectRaw('vendor_name, sum(purchased_qty) as total_qty')
                ->get();
    
            // Add the product name and its associated purchases to the stock array
            $stock[$product->id] = [
                'product_name' => $product->productname,
                'purchases' => $purchases
            ];
        }
    
        return view('stock', compact('stock'));
    }
}