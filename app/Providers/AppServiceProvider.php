<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\PaymentMethod;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Menyediakan data paymentMethods ke layout
        View::composer('layouts.layout', function ($view) {
            $paymentMethods = PaymentMethod::all();
            $campaigns = Campaign::all();
            $categories = Category::all();
        
            // Periksa apakah user sudah login
            $cartItems = collect(); // Pastikan ini sebagai collection
            if (Auth::check()) {
                $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
            }
        
            // Mengirimkan data paymentMethods, campaigns, categories, dan cartItems ke layout
            $view->with([
                'paymentMethods' => $paymentMethods,
                'campaigns' => $campaigns,
                'categories' => $categories,
                'cartItems' => $cartItems // Menambahkan cartItems sebagai koleksi
            ]);
        });
        
    }
}
