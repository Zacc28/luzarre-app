<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please log in to add to cart']);
        }

        // Validasi input
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Simpan data ke shopping_cart
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $validated['product_id'],
            'size' => $validated['size'],
            'quantity' => $validated['quantity'],
        ]);

        return response()->json(['success' => true, 'message' => 'Product added to cart successfully']);
    }
    public function getCartItems()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartItems = Cart::where('user_id', $userId)
                            ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                            ->select('products.name as product_name', 'shopping_carts.quantity', 'products.price')
                            ->get()
                            ->toArray();
            
            // Simpan data ke dalam session
            session(['cartItems' => $cartItems]);

            return response()->json(['success' => true, 'cartItems' => $cartItems]);
        } else {
            return response()->json(['success' => false, 'message' => 'User not logged in']);
        }
    }
}
