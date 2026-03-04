<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\StockEntry; // Ensure this matches your file name
use Illuminate\Http\Request;

class StockEntries_Controller extends Controller // Standard naming: StockEntryController
{
    public function create() {
    return view('stock_entries.create', [
        'products' => Product::all(),
        'suppliers' => Supplier::all()
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|integer|min:1',
            'delivery_reference' => 'required|unique:stock_entries,delivery_reference',
        ]);

        // 1. Update the Product Stock
        $product = Product::findOrFail($request->product_id);
        $product->current_stock += $request->quantity;
        $product->save();

        // 2. Attach Supplier/Delivery details
        // Note: Make sure your 'stock_entries' table has the relevant relationship setup
        $product->suppliers()->attach($request->supplier_id, [
            'quantity' => $request->quantity,
            'delivery_reference' => $request->delivery_reference,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 3. Redirect back to Dashboard with the success message
        return redirect()->route('dashboard')->with('success', 'Stock entry recorded successfully!');
    }
}