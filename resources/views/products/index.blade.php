@extends('layouts.app')

@section('content')
<div class="p-8 max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-stone-900">Products</h1>
        <p class="text-stone-500">Canteen Inventory Management System</p>
    </div>

    <div class="flex justify-between items-center mb-6">
        <p class="text-stone-600">{{ $products->count() }} products in catalog</p>
        <div class="relative">
            <input type="text" id="searchInput" placeholder="Search products..." 
                class="pl-10 pr-4 py-2 border border-stone-200 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-amber-800 w-64">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
    </div>

   <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-y-auto max-h-96 mb-12">
        <table id="productTable" class="w-full text-left border-collapse">
            <thead class="sticky top-0 bg-white z-10">
                <tr class="text-stone-400 text-xs uppercase tracking-wider border-b border-stone-100">
                    <th class="px-6 py-4">Code</th>
                    <th class="px-6 py-4">Product Name</th>
                    <th class="px-6 py-4">Price</th>
                    <th class="px-6 py-4">Current Stock</th>
                    <th class="px-6 py-4"></th> 
                </tr>
            </thead>
            <tbody class="divide-y divide-stone-100">
                @foreach($products as $product)
                <tr class="hover:bg-stone-50 transition">
                    <td class="px-6 py-4">
                        <span class="bg-stone-100 text-stone-700 px-3 py-1 rounded-md text-sm font-medium font-mono">
                            {{ $product->product_code }}
                        </span>
                    </td>
                    <td class="px-6 py-4 font-semibold text-stone-900 flex items-center space-x-3">
                        <div class="w-8 h-8 bg-stone-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-stone-500" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3h6l2 2H5zM5 7h10v9a1 1 0 01-1 1H6a1 1 0 01-1-1V7z"/></svg>
                        </div>
                        <span>{{ $product->product_name }}</span>
                    </td>
                    <td class="px-6 py-4 text-stone-700">₱{{ number_format($product->price, 2) }}</td>
                    <td class="px-6 py-4">
                        @php 
                            $stockColor = $product->current_stock < 50 ? 'bg-orange-100 text-orange-800' : 'bg-emerald-100 text-emerald-800'; 
                        @endphp
                        <span class="{{ $stockColor }} px-3 py-1 rounded-full text-sm font-medium">
                            {{ $product->current_stock }} units
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('products.show', $product->id) }}" class="text-amber-800 font-semibold hover:underline flex items-center justify-end space-x-1">
                            <span>View</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
        <h2 class="text-xl font-bold text-stone-900 mb-6">Add New Product</h2>
        
        <form action="{{ route('products.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf 

            <div>
                <label class="block text-sm font-bold text-stone-600 mb-2">Product Code</label>
                <input type="text" name="product_code" placeholder="e.g. PRD-001" required 
                       class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-600 mb-2">Product Name</label>
                <input type="text" name="product_name" placeholder="e.g. Oishi fish crackers" required 
                       class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-600 mb-2">Price (₱)</label>
                <input type="number" step="0.01" name="price" placeholder="0.00" required 
                       class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-stone-600 mb-2">Initial Stock</label>
                <input type="number" name="current_stock" placeholder="0" required 
                       class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl focus:ring-2 focus:ring-amber-800 outline-none">
            </div>

            <button type="submit" class="md:col-span-2 bg-stone-800 text-white py-3 rounded-xl font-bold hover:bg-amber-800 transition">
                Add Product
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#productTable tbody tr');
        
        rows.forEach(row => {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection