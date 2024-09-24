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

                <!-- Rating Section -->
                <div class="product-rating d-flex align-items-center">
                    <div class="rating-stars me-2">
                        @php
                            // Ambil bagian bilangan bulat dari rating
                            $fullStars = floor($averageRating); 
                            // Cek apakah ada sisa di belakang koma (jika bukan 0)
                            $hasHalfStar = ($averageRating - $fullStars) > 0 ? true : false; 
                        @endphp

                        <!-- Tampilkan bintang penuh -->
                        @for ($i = 0; $i < $fullStars; $i++)
                            <i class="bi bi-star-fill text-warning"></i>
                        @endfor

                        <!-- Tampilkan setengah bintang jika ada sisa di belakang koma -->
                        @if ($hasHalfStar)
                            <i class="bi bi-star-half text-warning"></i>
                        @endif

                        <!-- Tampilkan bintang kosong untuk sisanya -->
                        @for ($i = $fullStars + ($hasHalfStar ? 1 : 0); $i < 5; $i++)
                            <i class="bi bi-star text-warning"></i>
                        @endfor
                    </div>
                    <p class="rating-count mb-0">({{ $product->ratings->count() }} reviews)</p>
                </div>


                <div class="product-options">
                    <div class="mb-2">
                        <label for="size" class="form-label">Size:</label>
                        <select class="form-select" id="size" onchange="updateStock()">
                            <!-- Size options with stock -->
                            <option value="small" {{ $product->sizes->where('size', 'small')->first()->stock == 0 ? 'disabled' : '' }}>Small</option>
                            <option value="medium" {{ $product->sizes->where('size', 'medium')->first()->stock == 0 ? 'disabled' : '' }}>Medium</option>
                            <option value="large" {{ $product->sizes->where('size', 'large')->first()->stock == 0 ? 'disabled' : '' }}>Large</option>
                            <option value="x-large" {{ $product->sizes->where('size', 'x-large')->first()->stock == 0 ? 'disabled' : '' }}>X-Large</option>
                            <option value="xx-large" {{ $product->sizes->where('size', 'xx-large')->first()->stock == 0 ? 'disabled' : '' }}>XX-Large</option>
                        </select>

                        <!-- Stock Information -->
                        <p id="stock-info" class="stock-info">Stock available: <span id="stock-count">{{ $product->sizes->where('size', 'small')->first()->stock ?? 0 }}</span></p>
                    </div>

                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity:</label>
                        <input type="number" id="quantity" class="form-control" value="1" min="1" max="{{ $product->sizes->where('size', 'small')->first()->stock ?? 0 }}">
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-4">
                        <button class="btn btn-white button-cart w-100 p-2" id="addToCartButton">Add to Cart</button>
                    </div>                                        
                    <div class="col-8">
                        <button class="btn btn-dark button-buy w-100 p-2">Buy Now</button>
                    </div>
                </div>                                
            </div>
        </div>
    </div>
</div>

<script>
    var productSizes = @json($product->sizes);

    // Update stock information based on selected size and update max quantity
    function updateStock() {
        var selectedSize = document.getElementById('size').value;
        var stockInfo = productSizes.find(size => size.size === selectedSize);
        var stockCount = stockInfo ? stockInfo.stock : 0;

        // Update stock display
        document.getElementById('stock-count').innerText = stockCount;

        // Update the max attribute of the quantity input
        document.getElementById('quantity').setAttribute('max', stockCount);

        // Set quantity to 1 if it exceeds available stock
        if (document.getElementById('quantity').value > stockCount) {
            document.getElementById('quantity').value = stockCount;
        }
    }

    // Wishlist button toggle
    document.getElementById('wishlistIcon').addEventListener('click', function() {
        this.classList.toggle('bi-heart-fill');
        this.classList.toggle('bi-heart');
        this.style.color = this.classList.contains('bi-heart-fill') ? 'red' : 'black';
    });

    document.getElementById('quantity').addEventListener('input', function() {
        var maxQuantity = parseInt(this.getAttribute('max'));
        var currentValue = parseInt(this.value);

        if (currentValue > maxQuantity) {
            this.value = maxQuantity;
        } else if (currentValue < 1) {
            this.value = 1; // Menjaga agar minimal quantity adalah 1
        }
    });

    document.getElementById('addToCartButton').addEventListener('click', function() {
        var productId = {{ $product->id }};
        var selectedSize = document.getElementById('size').value;
        var quantity = document.getElementById('quantity').value;

        // Kirim data menggunakan AJAX
        fetch('{{ route('cart.add') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                product_id: productId,
                size: selectedSize,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Product added to cart successfully');
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again later.');
        });
    });

</script>

@endsection
