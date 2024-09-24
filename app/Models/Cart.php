<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'shopping_carts'; // Tentukan tabel yang digunakan

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relasi ke tabel Users
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke tabel Products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
