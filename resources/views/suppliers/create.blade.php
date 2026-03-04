@extends('layouts.app')

@section('content')
<div class="p-8 max-w-2xl mx-auto">
    <a href="{{ route('suppliers.index') }}" class="text-stone-500 hover:text-amber-900 mb-6 inline-block">← Back to Suppliers</a>
    
    <div class="bg-white p-8 rounded-2xl border border-stone-200 shadow-sm">
        <h1 class="text-2xl font-bold mb-6">Add New Supplier</h1>

        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-1">Supplier Name</label>
                    <input type="text" name="supplier_name" class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-1">Supplier Code</label>
                    <input type="text" name="supplier_code" placeholder="e.g. SUP-006" class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-1">Contact Email</label>
                    <input type="email" name="contact_email" class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl" required>
                </div>

                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-1">Contact Number</label>
                    <input type="text" name="contact_number" class="w-full p-3 bg-stone-50 border border-stone-200 rounded-xl" required>
                </div>
            </div>

            <button type="submit" class="w-full mt-8 bg-stone-800 text-white py-3 rounded-xl font-bold hover:bg-amber-800 transition">
                Save Supplier
            </button>
        </form>
    </div>
</div>
@endsection