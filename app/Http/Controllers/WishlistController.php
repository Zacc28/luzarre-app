<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function toggle(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userId = Auth::id();
        $productId = $request->product_id;

        // Cek apakah produk sudah ada di wishlist
        $wishlist = Wishlist::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        if ($wishlist) {
            // Jika produk sudah ada, hapus dari wishlist
            $wishlist->delete();
        } else {
            // Jika produk belum ada, tambahkan ke wishlist
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
        }

        // Tidak perlu mengembalikan response JSON
    }
}
