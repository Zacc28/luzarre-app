@extends('layouts.layout')

@section('title', 'Luzarre - Product Detail')

@section('content')
<div class="container-fluid product-detail-page">
    <div class="row">
        <!-- Carousel Section -->
        <div class="col-lg-6 col-md-6 col-12">
            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($product->images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('img/products/' . $image->image_url) }}" class="d-block w-100" alt="Product Image {{ $index + 1 }}">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!-- Product Details Section -->
        <div class="col-lg-6 col-md-6 col-12">
            <div class="product-details">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="product-title">{{ $product->name }}</h1>
                    <!-- Wishlist Icon -->
                    <i class="bi bi-heart wishlist-icon me-2" id="wishlistIcon"></i>
                </div>
                <p class="product-price">Rp. {{ number_format($product->price, 2) }}</p>
                <p class="product-description">{{ $product->description }}</p>

                <!-- Notifications Section -->
                <!-- Error notification -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Success notification -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Rating Section -->
                <div class="product-rating d-flex align-items-center">
                    <div class="rating-stars me-2">
                        @php
                            $fullStars = floor($averageRating); 
                            $hasHalfStar = ($averageRating - $fullStars) > 0 ? true : false; 
                        @endphp
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="bi bi-star-fill text-warning"></i>
                        @endfor
                        @if ($hasHalfStar)
                            <i class="bi bi-star-half text-warning"></i>
                        @endif
                        @for ($i = $fullStars + ($hasHalfStar ? 1 : 0); $i < 5; $i++)
                            <i class="bi bi-star text-warning"></i>
                        @endfor
                    </div>
                    <p class="rating-count mb-0">({{ $product->ratings->count() }} reviews)</p>
                </div>

                <!-- Product Options -->
                <div class="product-options">
                    <form id="productForm" action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="mb-2">
                            <label for="size" class="form-label">Size:</label>
                            <select class="form-select" id="size" name="size" required>
                                <option selected disabled>Pilih ukuran</option>
                                @forelse ($product->sizes as $size)
                                    <option value="{{ $size->size }}">{{ ucfirst($size->size) }}</option>
                                @empty
                                    <option value="" disabled>No sizes available</option>
                                @endforelse
                            </select>
                            <div class="invalid-feedback" id="sizeError">Please select a size.</div>
                        </div>

                        <!-- Stock Information -->
                        <p id="stock-info" class="stock-info">Stock available: <span id="stock-count">0</span></p>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" class="form-control" value="1" min="1" required>
                        </div>

                        <div class="row g-2">
                            <div class="col-4">
                                <button type="submit" class="btn btn-white button-cart w-100 p-2" id="addToCartButton">Add to Cart</button>
                            </div>                                        
                            <div class="col-8">
                                <button class="btn btn-dark button-buy w-100 p-2">Buy Now</button>
                            </div>
                        </div>  
                    </form>                              
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Stock data from the backend
    const stockData = @json($product->sizes->pluck('stock', 'size'));

    const sizeSelect = document.getElementById('size');
    const stockInfo = document.getElementById('stock-count');
    const quantityInput = document.getElementById('quantity');
    const sizeError = document.getElementById('sizeError');
    const productForm = document.getElementById('productForm');

    sizeError.style.display = 'none';  // Hide error by default

    sizeSelect.addEventListener('change', function() {
        const selectedSize = this.value;
        const stockCount = stockData[selectedSize] || 0;
        
        // Update stock information
        stockInfo.innerText = stockCount;

        // Adjust quantity if it exceeds stock
        if (quantityInput.value > stockCount) {
            quantityInput.value = stockCount;
        }

        // Set the max attribute for quantity input
        quantityInput.setAttribute('max', stockCount);

        // Hide error message when size is selected
        sizeError.style.display = 'none';
    });

    // Ensure quantity does not exceed stock when typing manually
    quantityInput.addEventListener('input', function() {
        const selectedSize = sizeSelect.value;
        const stockCount = stockData[selectedSize] || 0;

        if (this.value > stockCount) {
            this.value = stockCount;
        }
    });

    // Form validation before submission
    productForm.addEventListener('submit', function(event) {
        if (sizeSelect.value === 'Pilih ukuran' || sizeSelect.value === '') {
            event.preventDefault();  // Stop form submission
            sizeError.style.display = 'block';  // Show error message
        }
    });

    // Wishlist button toggle
    document.getElementById('wishlistIcon').addEventListener('click', function() {
        this.classList.toggle('bi-heart-fill');
        this.classList.toggle('bi-heart');
        this.style.color = this.classList.contains('bi-heart-fill') ? 'red' : 'black';
    });
</script>
@endsection
