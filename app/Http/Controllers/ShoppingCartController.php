<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    // Fungsi untuk mengambil semua item di shopping cart user
    public function index()
    {
        // Ambil data shopping cart dari user yang sedang login
        $cartItems = ShoppingCart::with('product')->where('user_id', Auth::id())->get();

        // Return view atau JSON data (untuk AJAX atau API)
        return view('cart.index', compact('cartItems'));
    }

    // Fungsi untuk menambahkan produk ke shopping cart
    public function addToCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Tambahkan atau update item di shopping cart
        $cart = ShoppingCart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $request->product_id],
            ['quantity' => $request->quantity]
        );

        return response()->json(['message' => 'Product added to cart', 'cart' => $cart]);
    }

    // Fungsi untuk menghapus item dari shopping cart
    public function removeFromCart($id)
    {
        $cartItem = ShoppingCart::where('user_id', Auth::id())->where('id', $id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['message' => 'Product removed from cart']);
        }

        return response()->json(['message' => 'Product not found'], 404);
    }
}
