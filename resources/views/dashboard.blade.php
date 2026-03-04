@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="text-stone-500">Canteen Inventory Management System</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
            <p class="text-stone-500 text-sm">Total Products</p>
            <p class="text-4xl font-black text-stone-900">{{ number_format($stats['total_products']) }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
            <p class="text-stone-500 text-sm">Total Suppliers</p>
            <p class="text-4xl font-black text-stone-900">{{ number_format($stats['total_suppliers']) }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
            <p class="text-stone-500 text-sm">Stock Entries</p>
            <p class="text-4xl font-black text-stone-900">{{ number_format($stats['stock_entries']) }}</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
            <p class="text-stone-500 text-sm">Total Units In</p>
            <p class="text-4xl font-black text-stone-900">{{ number_format($stats['total_units_in']) }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        
        <div class="xl:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200">
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-xl font-bold text-stone-900">Low Stock</h3>
                    <span class="px-3 py-1 bg-red-100 text-red-700 font-bold rounded-full text-xs">
                        {{ $low_stock_items->count() }} items urgent
                    </span>
                </div>
                
                <div class="space-y-4">
                    @forelse($low_stock_items as $item)
                    <div class="bg-stone-50 border border-stone-100 p-4 rounded-xl flex justify-between items-center">
                        <div>
                            <p class="font-bold text-stone-900">{{ $item->product_name }}</p>
                            <p class="text-xs text-stone-500">{{ $item->product_code }}</p>
                        </div>
                        <p class="text-2xl font-black text-red-600">{{ $item->current_stock }}</p>
                    </div>
                    @empty
                    <p class="text-center text-stone-500 py-4">All stock levels good!</p>
                    @endforelse
                </div>

                <a href="{{ route('stock.create') }}" class="block mt-6 text-center w-full py-3 bg-amber-950 text-white rounded-xl font-semibold hover:bg-amber-900 transition">
                    + New Stock Entry
                </a>
            </div>
        </div>

        <div class="xl:col-span-2">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-stone-200 overflow-hidden">
                <h3 class="text-xl font-bold text-stone-900 mb-5">Recent Deliveries</h3>
                
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-xs uppercase text-stone-400 border-b border-stone-100">
                            <th class="pb-3">Reference</th>
                            <th class="pb-3">Product</th>
                            <th class="pb-3">Supplier</th>
                            <th class="pb-3 text-right">Qty</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($recent_deliveries as $delivery)
                        <tr class="text-sm">
                            <td class="py-4 font-mono text-amber-800">{{ $delivery->delivery_reference }}</td>
                            <td class="py-4 font-semibold">{{ $delivery->product->product_name ?? 'N/A' }}</td>
                            <td class="py-4 text-stone-600">{{ $delivery->supplier->supplier_name ?? 'N/A' }}</td>
                            <td class="py-4 text-right font-black text-green-600">+{{ number_format($delivery->quantity) }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-10 text-stone-500">No deliveries yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection