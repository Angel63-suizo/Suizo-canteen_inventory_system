@extends('layouts.app')

@section('content')
<div class="p-8 max-w-4xl mx-auto">
    <a href="{{ route('dashboard') }}" class="text-stone-500 hover:text-amber-900 flex items-center space-x-1 mb-6 text-sm font-semibold transition">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        <span>Back to Dashboard</span>
    </a>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-stone-200">
        
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 p-4 rounded-xl text-red-800 text-sm">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-2xl font-bold text-stone-900 mb-6">New Stock Entry</h1>

        <form action="{{ route('stock.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-stone-700 mb-2">Product *</label>
                <select name="product_id" class="w-full p-4 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none transition">
                    <option value="">Select a product...</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-700 mb-2">Supplier *</label>
                <select name="supplier_id" class="w-full p-4 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none transition">
                    <option value="">Select a supplier...</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-700 mb-2">Delivery Reference *</label>
                <input type="text" name="delivery_reference" placeholder="e.g. DEL-2026-0301" 
                    class="w-full p-4 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none transition">
                <p class="text-xs text-stone-400 mt-2">Must be unique — cannot reuse an existing reference.</p>
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-700 mb-2">Quantity *</label>
                <input type="number" name="quantity" placeholder="Enter quantity" 
                    class="w-full p-4 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none transition">
            </div>
            
            <button type="submit" class="w-full py-4 bg-stone-800 text-white rounded-xl font-bold hover:bg-amber-900 transition">
                Save Stock Entry
            </button>
        </form>
    </div>
</div>
@endsection