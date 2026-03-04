@extends('layouts.app')

@section('content')
<div class="p-8 max-w-6xl mx-auto">
    <a href="{{ route('suppliers.index') }}" class="text-stone-500 hover:text-amber-900 mb-6 inline-block">
        &larr; Back to Suppliers
    </a>

    <div class="bg-stone-800 text-white p-8 rounded-2xl mb-8 flex justify-between items-center shadow-lg">
        <div class="flex items-center space-x-6">
            <div class="w-20 h-20 bg-stone-700 rounded-2xl flex items-center justify-center">
                <svg class="w-10 h-10 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
            </div>
            <div>
                <p class="text-stone-400 text-sm font-medium">{{ $supplier->supplier_code }}</p>
                <h1 class="text-3xl font-bold">{{ $supplier->supplier_name }}</h1>
            </div>
        </div>
        <div class="text-right">
            <p class="text-sm text-stone-300">{{ $supplier->contact_email }}</p>
            <p class="text-sm text-stone-300">{{ $supplier->contact_number }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-stone-100">
            <h2 class="text-xl font-bold text-stone-900">Products Supplied & Quantities Delivered</h2>
        </div>
        
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-stone-50 text-stone-400 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4">Product Code</th>
                    <th class="px-6 py-4">Product Name</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Qty Delivered</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($supplier->products as $product)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4 font-mono text-sm text-stone-600">{{ $product->product_code }}</td>
                    <td class="px-6 py-4 font-bold text-stone-800">{{ $product->product_name }}</td>
                    <td class="px-6 py-4 text-stone-600">₱{{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4 font-bold text-amber-800">
                        {{ $product->pivot->quantity }} units
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('products.show', $product->id) }}" class="text-amber-800 font-bold hover:underline">
                            View >
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection