@extends('layouts.layout')

@section('title', 'Luzarre - Collection')

@section('content')
<div class="container-fluid collection-page-container">
    <!-- Hero Section -->
    {{-- <div class="row">
        <div class="col-12 position-relative collection-hero-wrapper">
            <img src="{{ asset('img/campaign/campaign-1.jpg') }}" class="img-fluid w-100 h-100 object-fit-cover collection-hero-img img-darken" alt="Collection-Hero">
            <div class="collection-hero-content">
                <h3 class="collection-hero-title">Collection Title</h3>
                <p class="collection-hero-caption">
                    This section showcases a unique collection of products that embody a specific theme.
                </p>
            </div>
        </div>
    </div> --}}
    
    <!-- Hero Section -->
    <div class="row">
        <div class="col-12 position-relative collection-hero-wrapper bg-gray">
            <div class="collection-hero-content">
                <!-- Menampilkan judul dan deskripsi yang dikirim dari controller -->
                <h3 class="collection-hero-title">{{ $heroTitle }}</h3>
                <p class="collection-hero-caption">{{ $heroDescription }}</p>
            </div>
        </div>
    </div>


    <!-- Filter Section -->
    <div class="container-fluid">
        <div class="row justify-content-end mt-3">
            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-lg-end gap-1">
            {{-- <form action="{{ route('collection', ['slug' => $campaign ? $campaign->slug : ($category ? $category->slug : 'new-products')]) }}" method="GET" class="filter-form d-flex w-100 w-lg-auto gap-1">
                <div class="me-2 flex-fill">
                    <select name="sort-by" class="form-select filter-width w-100 w-lg-auto">
                        <option value="">Sort by</option>
                        <option value="a-z" {{ request('sort-by') == 'a-z' ? 'selected' : '' }}>Title: A-Z</option>
                        <option value="z-a" {{ request('sort-by') == 'z-a' ? 'selected' : '' }}>Title: Z-A</option>
                        <option value="newest" {{ request('sort-by') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ request('sort-by') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
                <div class="me-2 flex-fill">
                    <select name="price" class="form-select custom-width w-100 w-lg-auto">
                        <option value="">Prices</option>
                        <option value="0-300" {{ request('price') == '0-50' ? 'selected' : '' }}>Under Rp.300.000</option>
                        <option value="300-500" {{ request('price') == '50-100' ? 'selected' : '' }}>Rp.300.000 - Rp.500.000</option>
                        <option value="500-700" {{ request('price') == '100-200' ? 'selected' : '' }}>Rp.500.000 - Rp.700.000</option>
                        <option value=">700" {{ request('price') == '200' ? 'selected' : '' }}>Above Rp.700.000</option>
                    </select>
                </div>
                <div class="flex-fill">
                    <button type="submit" class="btn btn-dark custom-width w-100 w-lg-auto">Filter</button>
                </div>
            </form> --}}

            <form action="{{ route('collection', ['slug' => $campaign ? $campaign->slug : ($category ? $category->slug : 'new-products')]) }}" method="GET" class="filter-form d-flex w-100 w-lg-auto gap-1">
                <div class="me-2 flex-fill">
                    <select name="sort-by" class="form-select filter-width w-100 w-lg-auto">
                        <option value="">Sort by</option>
                        <option value="a-z" {{ request('sort-by') == 'a-z' ? 'selected' : '' }}>Title: A-Z</option>
                        <option value="z-a" {{ request('sort-by') == 'z-a' ? 'selected' : '' }}>Title: Z-A</option>
                        <option value="newest" {{ request('sort-by') == 'newest' ? 'selected' : '' }}>Newest</option>
                        <option value="oldest" {{ request('sort-by') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    </select>
                </div>
                <div class="me-2 flex-fill">
                    <select name="price" class="form-select custom-width w-100 w-lg-auto">
                        <option value="">Prices</option>
                        <option value="0-300" {{ request('price') == '0-300' ? 'selected' : '' }}>Under Rp.300.000</option>
                        <option value="300-500" {{ request('price') == '300-500' ? 'selected' : '' }}>Rp.300.000 - Rp.500.000</option>
                        <option value="500-700" {{ request('price') == '500-700' ? 'selected' : '' }}>Rp.500.000 - Rp.700.000</option>
                        <option value=">700" {{ request('price') == '>700' ? 'selected' : '' }}>Above Rp.700.000</option>
                    </select>
                </div>
                <div class="flex-fill">
                    <button type="submit" class="btn btn-dark custom-width w-100 w-lg-auto">Filter</button>
                </div>
            </form>
            
            
            </div>
        </div>
    </div>
    
    

    <!-- Product List Section -->
    <div class="container-fluid">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-lg-3 col-md-3 col-6 mb-4">
                <a href="{{ route('product.details', ['id' => $product->id]) }}" class="text-decoration-none text-dark">
                    <div class="collection-product-item position-relative">
                        @php
                            // Mendapatkan gambar dengan tipe cover dan hover
                            $mainImage = $product->images->where('type', 'cover')->first();
                            $hoverImage = $product->images->where('type', 'hover')->first();
                        @endphp
            
                        <!-- Gambar utama (cover) -->
                        @if ($mainImage)
                            <img src="{{ asset('img/products/' . $mainImage->image_url) }}" class="img-fluid collection-product-img" alt="{{ $product->name }}">
                        @endif
            
                        <!-- Gambar hover -->
                        @if ($hoverImage)
                            <img src="{{ asset('img/products/' . $hoverImage->image_url) }}" class="img-fluid collection-product-img-hover" alt="{{ $product->name }}-hover">
                        @endif
            
                        <div class="collection-product-info text-center mt-2">
                            <h5 class="collection-product-name">{{ $product->name }}</h5>
                            <p class="collection-product-price">Rp. {{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>
                </a>
            </div>                        
            @endforeach
        </div>
    </div>

</div>
@endsection
