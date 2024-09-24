<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

Route::get('/email/verify', function () {
    return view('auth.verify-email'); // Menampilkan halaman meminta verifikasi
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.resend');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
//     ->middleware(['auth', 'verified'])->name('home');


// Route untuk menampilkan form login dan menangani login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk menampilkan form registrasi dan menangani registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/cart/items', [CartController::class, 'getCartItems'])->name('cart.items');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');


// Route untuk halaman layout
Route::get('/payment-methods', [PaymentMethodController::class, 'getPaymentMethods']);

// Route untuk halaman home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route halaman collection produk terbaru (#New)
Route::get('/collection/new-products', [CollectionController::class, 'newProducts'])->name('new.products');

// Route Halaman Collection berdasarkan slug
Route::get('/collection/{slug}', [CollectionController::class, 'show'])->name('collection');

Route::get('/product/{id}', [ProductController::class, 'details'])->name('product.details');
