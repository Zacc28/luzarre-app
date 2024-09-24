<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function show($slug, Request $request)
    {
        // Coba cari slug di tabel campaign
        $campaign = Campaign::where('slug', $slug)->first();
        
        // Jika tidak ditemukan di campaign, coba cari di category
        $category = null;
        if (!$campaign) {
            $category = Category::where('slug', $slug)->firstOrFail(); // Jika tidak ditemukan, gagal
        }

        // Tentukan variabel hero untuk menyesuaikan judul dan deskripsi
        $heroTitle = $campaign ? $campaign->name : $category->name;
        $heroDescription = $campaign ? $campaign->description : $category->description;

        // Ambil produk yang terkait dengan campaign atau category
        $query = $campaign 
            ? $campaign->products()->with('images') 
            : $category->products()->with('images');
        
        // Filter dan sort berdasarkan request
        if ($request->has('sort-by')) {
            switch ($request->input('sort-by')) {
                case 'a-z':
                    $query->orderBy('name', 'asc');
                    break;
                case 'z-a':
                    $query->orderBy('name', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        }

        if ($request->has('price')) {
            switch ($request->input('price')) {
                case '0-300':
                    $query->whereBetween('price', [0, 300000]);
                    break;
                case '300-500':
                    $query->whereBetween('price', [300000, 500000]);
                    break;
                case '500-700':
                    $query->whereBetween('price', [500000, 700000]);
                    break;
                case '>700':
                    $query->where('price', '>', 700000);
                    break;
            }
        }

        $products = $query->get();

        return view('collection', compact('heroTitle', 'heroDescription', 'products', 'campaign', 'category'));
    }

    public function newProducts(Request $request)
    {
        // Ambil semua produk terbaru dengan filter dan sorting
        $query = Product::with('images');

        // Filter dan sort berdasarkan request
        if ($request->has('sort-by')) {
            switch ($request->input('sort-by')) {
                case 'a-z':
                    $query->orderBy('name', 'asc');
                    break;
                case 'z-a':
                    $query->orderBy('name', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
            }
        } else {
            // Jika tidak ada filter sorting, urutkan berdasarkan produk terbaru secara default
            $query->orderBy('created_at', 'desc');
        }

        if ($request->has('price')) {
            switch ($request->input('price')) {
                case '0-300':
                    $query->whereBetween('price', [0, 300000]);
                    break;
                case '300-500':
                    $query->whereBetween('price', [300000, 500000]);
                    break;
                case '500-700':
                    $query->whereBetween('price', [500000, 700000]);
                    break;
                case '>700':
                    $query->where('price', '>', 700000);
                    break;
            }
        }

        // Ambil produk dengan query yang sudah difilter
        $products = $query->get();

        // Set hero section untuk halaman "New Products"
        $heroTitle = 'New Arrivals';
        $heroDescription = 'Discover the latest products just added.';
        
        // Pass campaign and category as null
        $campaign = null;
        $category = null;

        return view('collection', compact('heroTitle', 'heroDescription', 'products', 'campaign', 'category'));
    }
}
