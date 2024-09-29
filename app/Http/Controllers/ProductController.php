<?php 
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function details($id)
    {
        // Ambil data produk beserta gambar, ukuran, dan rating
        $product = Product::with(['images', 'sizes', 'ratings'])->findOrFail($id);

        // Hitung rata-rata rating produk ini dan bulatkan ke 1 angka di belakang koma
        $averageRating = round($product->ratings()->avg('rating'), 1);

        // Cek apakah produk ada di wishlist user yang sedang login
        $isInWishlist = false;
        if (Auth::check()) {
            $isInWishlist = Wishlist::where('user_id', Auth::id())
                                    ->where('product_id', $product->id)
                                    ->exists();
        }

        return view('details', compact('product', 'averageRating', 'isInWishlist'));
    }
}
