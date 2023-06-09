<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'status', 'payment_method', 'total', 'address', 'city'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function getTotalAttribute()
    {
        $total = 0;

        foreach ($this->orderItems as $orderItem) {
            $total += $orderItem->price * $orderItem->quantity;
        }

        return $total;
    }
}
