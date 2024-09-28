<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Relasi one-to-many ke ProductSize
    public function sizes()
    {
        return $this->hasMany(ProductSize::class);
    }

    // Relasi dengan gambar produk
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    // Relasi dengan rating produk
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
