<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
{
    $product->load(['suppliers', 'stockEntries']);

    return view('products.show', compact('product'));
}
    
public function store(Request $request)
{
    // Validate the input
    $validated = $request->validate([
        'product_code' => 'required|unique:products,product_code',
        'product_name' => 'required|string|max:255',
        'price'        => 'required|numeric|min:0',
        'current_stock'=> 'required|integer|min:0',
    ]);

    \App\Models\Product::create($validated);

    return back()->with('success', 'Product added successfully!');
}
}
