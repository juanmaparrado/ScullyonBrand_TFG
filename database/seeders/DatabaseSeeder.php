<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Staff;
use App\Models\Store;
use App\Models\Inventory;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Image;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermisionSeeder::class,
            UserSeeder::class,
        ]);
        Category::factory()->count(10)->create();
        Product::factory()->count(20)->create();
        Review::factory()->count(30)->create();
        Store::factory()->count(5)->create();
        Staff::factory()->count(10)->create();
        Inventory::factory()->count(50)->create();
        Order::factory()->count(20)->create();
        //Image::factory()->count(40)->create();
        OrderItem::factory()->count(100)->create();
    }
}
