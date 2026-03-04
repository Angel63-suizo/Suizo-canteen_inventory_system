@extends('layouts.app')

@section('content')
<div class="p-8 max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-stone-900">Suppliers</h1>
        <p class="text-stone-500">Canteen Inventory Management System</p>
    </div>

    <div class="flex justify-between items-center mb-6">
        <div class="relative w-64">
            <input type="text" id="supplierSearch" placeholder="Search suppliers..." 
                class="w-full pl-10 pr-4 py-2 border border-stone-200 rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-amber-800">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-stone-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </div>
        
        <a href="{{ route('suppliers.create') }}" class="bg-stone-800 text-white px-6 py-3 rounded-xl font-bold hover:bg-amber-800 transition">
            + Add Supplier
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-stone-200 shadow-sm overflow-hidden">
        <table id="supplierTable" class="w-full text-left border-collapse">
        <thead class="sticky top-0 bg-stone-50 z-10">
            <tr class="text-stone-400 text-xs uppercase tracking-wider border-b border-stone-100">
                <th class="px-6 py-4">Code</th>
                <th class="px-6 py-4">Supplier Name</th>
                <th class="px-6 py-4">Contact</th>
                <th class="px-6 py-4">Products</th>
                <th class="px-6 py-4 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-stone-100">
            @foreach($suppliers as $supplier)
            <tr class="hover:bg-amber-50/30 transition-colors">
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="bg-stone-100 text-stone-700 px-3 py-1 rounded-md text-xs font-mono font-bold">
                        {{ $supplier->supplier_code }}
                    </span>
                </td>
                
                <td class="px-6 py-4 align-middle">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-stone-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-stone-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path></svg>
                        </div>
                        <span class="font-bold text-stone-800">{{ $supplier->supplier_name }}</span>
                    </div>
                </td>

                <td class="px-6 py-4 text-sm text-stone-600">
                    <div class="flex flex-col">
                        <span>{{ $supplier->contact_email }}</span>
                        <span class="text-stone-400 text-xs">{{ $supplier->contact_number }}</span>
                    </div>
                </td>

                <td class="px-6 py-4 align-middle">
                    <span class="bg-amber-100 text-amber-800 px-3 py-1 rounded-full text-xs font-bold">
                        {{ $supplier->products_count }} products
                    </span>
                </td>
                
                <td class="px-6 py-4 text-right align-middle whitespace-nowrap">
                    <a href="{{ route('suppliers.show', $supplier->id) }}" class="text-amber-800 font-bold hover:text-amber-600 transition">
                        View &rarr;
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('supplierSearch').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#supplierTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection