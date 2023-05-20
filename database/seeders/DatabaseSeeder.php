<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
        ]);
        \App\Models\Category::factory()->count(10)->create();
        \App\Models\Product::factory()->count(20)->create();
        \App\Models\Review::factory()->count(30)->create();
        \App\Models\Store::factory()->count(5)->create();
        \App\Models\Staff::factory()->count(10)->create();
        \App\Models\Inventory::factory()->count(50)->create();
        \App\Models\Order::factory()->count(20)->create();
        \App\Models\Image::factory()->count(40)->create();
        \App\Models\OrderItem::factory()->count(100)->create();
    }
}
