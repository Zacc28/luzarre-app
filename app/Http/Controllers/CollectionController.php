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
        // Mengambil slug untuk campaign atau category
        $campaign = Campaign::where('slug', $slug)->first();
        $category = null;

        // Jika tidak ditemukan campaign, cari di category
        if (!$campaign) {
            $category = Category::where('slug', $slug)->firstOrFail();
        }

        // Menentukan variabel hero untuk menyesuaikan judul dan deskripsi
        $heroTitle = $campaign ? $campaign->name : $category->name;
        $heroDescription = $campaign ? $campaign->description : $category->description;

        // Ambil produk yang terkait dengan campaign atau category
        $query = $campaign 
            ? $campaign->products()->with('images') 
            : $category->products()->with('images');
        
        // Filter dan sort berdasarkan request
        $this->applyFilters($query, $request);

        $products = $query->get();

        return view('collection', compact('heroTitle', 'heroDescription', 'products', 'campaign', 'category'));
    }



    public function searchProducts(Request $request)
    {
        // Mengambil inputan searchQuery dari form
        $searchQuery = $request->input('searchQuery'); 
    
        // Mulai query untuk mencari produk berdasarkan nama yang mengandung searchQuery
        $query = Product::with('images')->where('name', 'like', '%' . $searchQuery . '%');
    
        // Sorting dan Filtering
        $this->applyFilters($query, $request);
    
        // Mengambil hasil query produk
        $products = $query->get();
    
        // Mengatur judul dan deskripsi hero section
        $heroTitle = 'Search Results';
        $heroDescription = 'Showing results for "' . $searchQuery . '"';
    
        // Mengirim data ke view
        return view('collection', compact('heroTitle', 'heroDescription', 'products', 'searchQuery'));
    }

    public function newProducts(Request $request)
    {
        // Mulai query untuk produk baru
        $query = Product::with('images')
            ->where('created_at', '>=', now()->subDays(30));

        // Terapkan filter dan sorting
        $this->applyFilters($query, $request);

        // Ambil produk yang sudah difilter
        $products = $query->orderBy('created_at', 'desc')->get();

        $heroTitle = 'New Arrivals';
        $heroDescription = 'Check out the latest products added to our collection!';

        // Tambahkan ini untuk menghindari undefined variable error
        $campaign = null;
        $category = null;

        return view('collection', compact('heroTitle', 'heroDescription', 'products', 'campaign', 'category'));
    }



    private function applyFilters($query, Request $request)
    {
        // Filter berdasarkan sorting
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

        // Filter berdasarkan harga
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
    }
}
