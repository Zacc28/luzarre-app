<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Explicitly define the table name
    protected $table = 'shopping_carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'quantity',
    ];

    // Define relationship with the User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define relationship with the Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
