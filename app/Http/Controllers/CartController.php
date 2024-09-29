<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Ambil user ID dari session (pastikan user sudah login)
        $userId = Auth::id();

        // Periksa apakah produk sudah ada di cart
        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $validated['product_id'])
            ->where('size', $validated['size'])
            ->first();

        if ($cartItem) {
            // Jika produk sudah ada di cart, update quantity
            $cartItem->quantity += $validated['quantity'];
            $cartItem->save();
        } else {
            // Jika produk belum ada di cart, buat entry baru
            Cart::create([
                'user_id' => $userId,
                'product_id' => $validated['product_id'],
                'size' => $validated['size'],
                'quantity' => $validated['quantity'],
            ]);
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // CartController.php
    public function updateQuantity(Request $request)
    {
        $cartItem = Cart::findOrFail($request->cart_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        // Mengembalikan response JSON
        return response()->json([
            'success' => true,
            'quantity' => $cartItem->quantity,
            'total_price' => number_format($cartItem->quantity * $cartItem->product->price, 2)
        ]);
    }

    public function remove(Request $request)
    {
        $cartItem = Cart::findOrFail($request->cart_id);

        // Hapus item dari cart
        $cartItem->delete();

        // Mengembalikan response JSON
        return response()->json([
            'success' => true,
            'message' => 'Item removed from cart'
        ]);
    }

}
