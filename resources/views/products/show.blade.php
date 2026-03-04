@extends('layouts.app')

@section('content')
<div class="p-8 max-w-6xl mx-auto">
    <a href="{{ route('products.index') }}" class="text-stone-500 hover:text-amber-900 flex items-center mb-6">
        ← Back to Products
    </a>

    <div class="bg-stone-800 p-8 rounded-2xl flex justify-between items-center text-white mb-8">
        <div>
            <p class="text-stone-400 text-sm">PRD-{{ str_pad($product->id, 3, '0', STR_PAD_LEFT) }}</p>
            <h1 class="text-3xl font-bold">{{ $product->product_name }}</h1>
        </div>
        <div class="flex gap-8">
            <div>
                <p class="text-stone-400 text-sm">Unit Price</p>
                <p class="text-xl font-bold">₱{{ number_format($product->price, 2) }}</p>
            </div>
            <div>
                <p class="text-stone-400 text-sm">Current Stock</p>
                <p class="text-xl font-bold">{{ $product->current_stock }} units</p>
            </div>
            <a href="{{ route('stock.create') }}" class="bg-amber-700 hover:bg-amber-600 px-6 py-3 rounded-xl font-bold transition">
                + Add Stock
            </a>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-8">
        <div class="bg-white p-6 rounded-2xl border border-stone-200">
            <h2 class="font-bold mb-4">Suppliers That Delivered</h2>
            @foreach($product->suppliers->unique('id') as $supplier)
                <div class="flex justify-between items-center py-4 border-b border-stone-100">
                    <p class="font-medium">{{ $supplier->supplier_name }}</p>
                    <p class="text-stone-500">{{ $supplier->pivot->quantity }} units</p>
                </div>
            @endforeach
        </div>

        <div class="bg-white p-6 rounded-2xl border border-stone-200">
            <h2 class="font-bold mb-4">Total Stock History</h2>
            @foreach($product->stockEntries()->latest()->get() as $entry)
                <div class="flex justify-between items-center py-4 border-b border-stone-100">
                    <div>
                        <p class="font-medium">{{ $entry->delivery_reference }}</p>
                        <p class="text-xs text-stone-400">{{ $entry->supplier->supplier_name }}</p>
                    </div>
                    <div class="text-right">
                        <p class="text-emerald-600 font-bold">+{{ $entry->quantity }}</p>
                        <p class="text-xs text-stone-400">{{ $entry->created_at->format('M j, Y') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection