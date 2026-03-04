<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockEntry;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_products' => Product::count(),
            'total_suppliers' => \App\Models\Supplier::count(),
            'stock_entries' => StockEntry::count(),
            'total_units_in' => StockEntry::sum('quantity'), 
        ];

        // Only fetch what is displayed on the dashboard
        $low_stock_items = Product::where('current_stock', '<', 5)
                                    ->orderBy('current_stock', 'asc')
                                    ->take(5) 
                                    ->get();

        $recent_deliveries = StockEntry::with(['product', 'supplier'])
                                       ->orderBy('created_at', 'desc')
                                       ->take(5) 
                                       ->get();

        return view('dashboard', compact('stats', 'low_stock_items', 'recent_deliveries'));
    }
}