<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    // Relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

