<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'city', 'phone'];

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
}
