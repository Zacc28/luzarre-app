<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Luzarre - Homepage')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda+SC:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
  <!-- Navbar Starts Here -->
  <nav class="navbar navbar-expand-lg navbar-custom sticky-top shadow-sm">
    <div class="container-fluid d-flex align-items-center justify-content-between">
      <a class="navbar-brand" href="{{ route('home') }}">LUZARRE</a>
      <div class="d-flex align-items-center">
        <ul class="navbar-nav ms-auto d-flex flex-row align-items-center">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-bag"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="profile-toggle"><i class="bi bi-person"></i></a>
          </li>        
          <li class="nav-item">
            <a class="nav-link" href="#" id="menu-toggle"><i class="bi bi-list"></i><span>Menu</span></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar Ends Here -->

  <!-- Sidebar Starts Here -->
  <div class="sidebar" id="sidebar">
    <i class="bi bi-x close-btn" id="close-btn"></i>
    <h3 class="sidebar-brand p-2 mb-2">LUZARRE</h3>
    <ul class="sidebar-list">
        <li><a href="{{ route('new.products') }}" class="d-block p-2 mb-2"><i>#New</i></a></li>
        
        <!-- Collection Links -->
        @if(isset($categories) && $categories->count() > 0)
            @foreach($categories as $category)
                <li><a href="{{ route('collection', $category->slug) }}" class="d-block p-2 mb-2">{{ $category->name }}</a></li>
            @endforeach
        @endif

        <li><a href="#" class="d-block p-2 mb-2">Contact Us</a></li>
        <li><a href="#" class="d-block p-2 mb-2">Services</a></li>
    </ul>
  </div>
  <!-- Sidebar Ends Here -->



  <!-- Sidebar Profile Starts Here -->
  <div class="sidebar" id="profile-sidebar">
    <i class="bi bi-x close-btn" id="profile-close-btn"></i>
    <h3 class="sidebar-brand p-2 mb-2">LUZARRE</h3>

    @auth
    <!-- Jika sudah login, tampilkan menu profile -->
    <ul class="sidebar-list">
        <li><a href="#" class="d-block p-2 mb-2">Profile</a></li>
        <li><a href="#" class="d-block p-2 mb-2">Wishlist</a></li>
        <li><a href="#" class="d-block p-2 mb-2">Account Settings</a></li>
        <li>
            <a href="{{ route('logout') }}" class="d-block p-2 mb-2"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    @endauth

    @guest
      <!-- Jika belum login, tampilkan teks dan tombol login -->
      <div class="login-prompt p-2">
          <p class="text-center mb-3">Please log in or register to access your profile.</p>
          <a href="{{ route('login') }}" class="btn btn-dark w-100 mb-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-outline-dark w-100">Register</a>
      </div>
    @endguest
  </div>
  <!-- Sidebar Profile Ends Here -->

  <!-- Sidebar Search Starts Here -->
  <div class="sidebar" id="search-sidebar">
    <i class="bi bi-x close-btn" id="search-close-btn"></i>
    <h3 class="sidebar-brand p-2 mb-2">LUZARRE</h3>
    <form action="{{ route('search.products') }}" method="GET" class="p-2">
        <div class="mb-3">
            <input type="text" class="form-control w-100" name="searchQuery" placeholder="Search something?" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">Search</button>
    </form>
    
  </div>
  <!-- Sidebar Search Ends Here -->

  <!-- Sidebar Cart Starts Here -->
  <div class="sidebar d-flex flex-column" id="cart-sidebar">
    <i class="bi bi-x close-btn" id="cart-close-btn"></i>
    <h3 class="sidebar-brand p-2 mb-2">LUZARRE</h3>

    @auth
        <ul class="list-group flex-grow-1 overflow-auto mb-4">
            @forelse($cartItems as $cartItem)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="cart-item d-flex">
                        <!-- Thumbnail -->
                        @php
                        // Mendapatkan gambar dengan tipe "thumbnail"
                        $thumbnailImage = $cartItem->product->images->where('type', 'thumbnail')->first();
                        @endphp

                        <div class="cart-item-thumbnail">
                        <!-- Jika gambar thumbnail tersedia, tampilkan -->
                        @if ($thumbnailImage)
                            <a href="{{ route('product.details', ['id' => $cartItem->product->id]) }}">
                                <img src="{{ asset('img/products/' . $thumbnailImage->image_url) }}" alt="{{ $cartItem->product->name }}" class="img-fluid" style="width: 60px; height: 60px;">
                            </a>
                        @endif
                        </div>

                        <!-- Product Details -->
                        <div class="cart-item-details ms-3">
                            <h5>
                              <a href="{{ route('product.details', ['id' => $cartItem->product->id]) }}" class="text-decoration-none text-dark">
                                  {{ $cartItem->product->name }}
                              </a>
                            </h5>
                            <p>Rp. {{ number_format($cartItem->product->price, 2) }}</p>
                            <span>{{ ucfirst($cartItem->size) }}</span>

                            <!-- Quantity Controls -->
                            <div class="quantity-controls d-flex align-items-center">
                                <button class="btn btn-light btn-sm decrease-quantity" data-cart-id="{{ $cartItem->id }}">-</button>
                                <span class="mx-2 quantity-value">{{ $cartItem->quantity }}</span>
                                <button class="btn btn-light btn-sm increase-quantity" data-cart-id="{{ $cartItem->id }}">+</button>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
                <li class="list-group-item">Your cart is empty.</li>
            @endforelse
        </ul>

        <!-- Total and Checkout Button (Fixed at the bottom) -->
        <div class="cart-total-container border-top pt-1">
            <div class="d-flex justify-content-between px-3">
                <h5>Total:</h5>
                <h5>Rp. {{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</h5>
            </div>
            <div class="px-3">
                <a href="#" class="btn btn-dark w-100 mt-2">Checkout</a>
            </div>
        </div>
    @else
        <!-- Ubah bagian ini sesuai dengan sidebar profile -->
        <div class="login-prompt p-2">
            <p class="text-center mb-3">Please log in or register to view your cart.</p>
            <a href="{{ route('login') }}" class="btn btn-dark w-100 mb-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-dark w-100">Register</a>
        </div>
    @endauth
  </div>

  <!-- Sidebar Cart Ends Here -->


  <!-- Overlay Starts Here -->
  <div class="overlay" id="overlay"></div>
  <!-- Overlay Ends Here -->
  
  <!-- Content Starts Here -->
  <div class="container-fluid">
    @yield('content')
  </div>
  <!-- Content Ends Here -->

  <!-- Footer Starts Here -->
  <footer class="footer-custom py-5 bg-light text-dark">
    <div class="container">
      <div class="row">
        <!-- Social Media Icons Column -->
        <div class="col-lg-6 col-md-6 col-6 px-4 mb-4 mb-lg-0 d-flex flex-column align-items-start">
          <div class="social-icons mb-3">
            <a href="#" class="text-dark me-3"><i class="bi bi-facebook"></i></a>
            <a href="#" class="text-dark me-3"><i class="bi bi-tiktok"></i></a>
            <a href="#" class="text-dark me-3"><i class="bi bi-instagram"></i></a>
          </div>
          <p class="mb-0">© 2024 Luzarre. All rights reserved.</p>
        </div>
  
        <!-- Customer Service Column -->
        <div class="col-lg-2 col-md-2 col-6 px-4 mb-4 mb-lg-0">
          <h5 class="mb-3">CUSTOMER SERVICE</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark"><span>Help Center</span></a></li>
            <li><a href="#" class="text-dark"><span>Returns</span></a></li>
            <li><a href="#" class="text-dark"><span>Shipping</span></a></li>
            <li><a href="#" class="text-dark"><span>FAQs</span></a></li>
          </ul>
        </div>
  
        <!-- Marketplace Column -->
        <div class="col-lg-2 col-md-2 col-6 px-4 mb-4 mb-lg-0">
          <h5 class="mb-3">MARKETPLACE</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark"><span>Tokopedia</span></a></li>
            <li><a href="#" class="text-dark"><span>Shopee</span></a></li>
            <li><a href="#" class="text-dark"><span>Lazada</span></a></li>
          </ul>
        </div>
  
        <!-- Contact Us Column -->
        <div class="col-lg-2 col-md-2 col-6 px-4">
          <h5 class="mb-3">CONTACT US</h5>
          <ul class="list-unstyled">
            <li><a href="#" class="text-dark"><span>Email</span></a></li>
            <li><a href="#" class="text-dark"><span>Phone</span></a></li>
            <li><a href="#" class="text-dark"><span>Address</span></a></li>
          </ul>
        </div>
      </div>

      <!-- Payment Methods Row -->
      <div class="row mt-5 mb-2">
        <div class="col-12 d-flex justify-content-center flex-wrap payment-methods">
            @foreach($paymentMethods as $payment)
                <img src="{{ asset('img/payments/' . $payment->media_url) }}" alt="{{ $payment->name }}" class="me-2 payment-img">
            @endforeach
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer Ends Here -->





  <script>
    // Handle Hamburger Sidebar
    document.getElementById('menu-toggle').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('show');
    });

    document.getElementById('close-btn').addEventListener('click', function () {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    });

    // Handle Profile Sidebar
    document.getElementById('profile-toggle').addEventListener('click', function () {
        document.getElementById('profile-sidebar').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('show');
    });

    document.getElementById('profile-close-btn').addEventListener('click', function () {
        document.getElementById('profile-sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    });

    // Handle Search Sidebar
    document.querySelector('.bi-search').addEventListener('click', function () {
        document.getElementById('search-sidebar').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('show');
    });

    document.getElementById('search-close-btn').addEventListener('click', function () {
        document.getElementById('search-sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    });

    // Handle Cart Sidebar
    document.querySelector('.bi-bag').addEventListener('click', function () {
        document.getElementById('cart-sidebar').classList.toggle('open');
        document.getElementById('overlay').classList.toggle('show');
    });

    document.getElementById('cart-close-btn').addEventListener('click', function () {
        document.getElementById('cart-sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    });


    // Handle Overlay Click to Close All Sidebars
    document.getElementById('overlay').addEventListener('click', function () {
        document.getElementById('sidebar').classList.remove('open');
        document.getElementById('profile-sidebar').classList.remove('open');
        document.getElementById('search-sidebar').classList.remove('open');
        document.getElementById('cart-sidebar').classList.remove('open');
        document.getElementById('overlay').classList.remove('show');
    });

    // Handle increase and decrease quantity
    document.querySelectorAll('.increase-quantity').forEach(button => {
        button.addEventListener('click', function () {
            const cartId = this.getAttribute('data-cart-id');
            updateQuantity(cartId, 1);
        });
    });

    document.querySelectorAll('.decrease-quantity').forEach(button => {
        button.addEventListener('click', function () {
            const cartId = this.getAttribute('data-cart-id');
            updateQuantity(cartId, -1);
        });
    });

    function updateQuantity(cartId, change) {
        const quantityElement = document.querySelector(`[data-cart-id="${cartId}"]`).parentNode.querySelector('.quantity-value');
        let currentQuantity = parseInt(quantityElement.textContent);

        if (currentQuantity + change > 0) {  // Jika quantity masih > 0
            currentQuantity += change;

            // AJAX request untuk update quantity
            fetch('{{ route('cart.update') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                    cart_id: cartId,
                    quantity: currentQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update quantity pada halaman
                    quantityElement.textContent = data.quantity;
                }
            })
            .catch(error => console.error('Error:', error));
        } else {
            // Jika quantity = 0, hapus item dari cart
            removeCartItem(cartId, quantityElement.closest('li'));
        }
    }

    function removeCartItem(cartId, cartItemElement) {
        // AJAX request untuk menghapus item dari cart
        fetch('{{ route('cart.remove') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({
                cart_id: cartId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hapus item dari DOM
                cartItemElement.remove();
                console.log('Item removed successfully');
            }
        })
        .catch(error => console.error('Error:', error));
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
