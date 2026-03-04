<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_name',
        'supplier_code',
        'contact_email',
        'contact_number',
    ];
    
    public function products()
{
    return $this->belongsToMany(Product::class, 'stock_entries')
                ->withPivot('quantity', 'delivery_reference')
                ->withTimestamps();
}
}
