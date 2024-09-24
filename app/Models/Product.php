<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke campaign
    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    // Relasi ke product images
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi ke ukuran produk
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    // Relasi ke rating
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
