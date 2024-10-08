@extends('layouts.layout')

@section('title', 'Luzarre - Collection')

@section('content')
<div class="container-fluid collection-page-container">
    <!-- Hero Section -->
    <div class="row">
        <div class="col-12 position-relative collection-hero-wrapper bg-gray">
            <div class="collection-hero-content">
                <h3 class="collection-hero-title">{{ $heroTitle }}</h3>
                <p class="collection-hero-caption">{{ $heroDescription }}</p>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="container-fluid">
        <div class="row justify-content-end mt-3">
            <div class="col-12 col-md-6 col-lg-6 d-flex justify-content-lg-end gap-1">
                <form action="{{ isset($searchQuery) ? route('search.products') : (isset($campaign) ? route('collection', ['slug' => $campaign->slug]) : (isset($category) ? route('collection', ['slug' => $category->slug]) : route('new.products'))) }}" method="GET" class="filter-form d-flex w-100 w-lg-auto gap-1">
                    <!-- Menyimpan searchQuery jika ada -->
                    <input type="hidden" name="searchQuery" value="{{ request('searchQuery') }}">
                    
                    <div class="me-2 flex-fill">
                        <select name="sort-by" class="form-select filter-width w-100 w-lg-auto">
                            <option value="" selected disabled>Sort by</option>
                            <option value="a-z" {{ request('sort-by') == 'a-z' ? 'selected' : '' }}>Title: A-Z</option>
                            <option value="z-a" {{ request('sort-by') == 'z-a' ? 'selected' : '' }}>Title: Z-A</option>
                            <option value="newest" {{ request('sort-by') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="oldest" {{ request('sort-by') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                        </select>
                    </div>
                    <div class="me-2 flex-fill">
                        <select name="price" class="form-select custom-width w-100 w-lg-auto">
                            <option value="" selected disabled>Prices</option>
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
            @if($products->isEmpty())
                <p>No products found.</p>
            @else
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-3 col-6 mb-4">
                    <a href="{{ route('product.details', ['id' => $product->id]) }}" class="text-decoration-none text-dark">
                        <div class="collection-product-item position-relative">
                            @php
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
            @endif
        </div>
    </div>
</div>
@endsection
