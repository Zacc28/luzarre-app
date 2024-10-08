<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;

    // Relasi ke model 'Product'
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
