<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email','password', 'salary', 'bank_account', 'store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
