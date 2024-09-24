<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function details($id)
    {
        // Ambil data produk beserta gambar, ukuran, dan rating
        $product = Product::with(['images', 'sizes', 'ratings'])->findOrFail($id);

        // Hitung rata-rata rating produk ini dan bulatkan ke 1 angka di belakang koma
        $averageRating = round($product->ratings()->avg('rating'), 1);

        return view('details', compact('product', 'averageRating'));
    }
}
