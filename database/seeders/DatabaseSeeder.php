<?php

namespace Database\Seeders;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Supplier::factory()->count(5)->create();

        Product::factory()->count(10)->create();
    }
}
