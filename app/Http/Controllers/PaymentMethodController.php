<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod; // Pastikan model PaymentMethod diimport
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function getPaymentMethods()
    {
        $paymentMethods = PaymentMethod::all(); // Mengambil semua metode pembayaran
        return view('layouts.layout', compact('paymentMethods'));
    }
}
