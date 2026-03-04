<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::withCount('products')->get(); 
        return view('suppliers.index', compact('suppliers'));

    }

    public function show($id)
    {
        $supplier = Supplier::with('products')->findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'supplier_code' => 'required|string|unique:suppliers,supplier_code',
            'contact_email' => 'required|email',
            'contact_number' => 'required|string',
        ]);

        Supplier::create($validated);

        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully!');
    }
}
