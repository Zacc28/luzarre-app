<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        $categories = Category::all(); // Mengambil semua data dari tabel categories
        return view('home', compact('campaigns', 'categories'));
    }
}
