<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Review;
use App\Models\Image;
use App\Models\Inventory;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'stock', 'description', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }
}
