<nav class="navbar navbar-expand-lg bg-success text-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-light" href="#">Ayang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/categories">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="/products">Products</a>
          </li>
          @auth
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Transaction</a>
          </li>
          @endauth
        </ul>
        </div>
        @auth
            <a href="#" id="shopping-cart-button" style="color: white;" class="me-2 ms-2"><i data-feather="shopping-cart"></i></a>
            <a class="nav-link text-white" href="#">Welcome, {{ auth()->user()->name }}</a>
            <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger ms-3 me-3">Logout</button>
            </form>
            @if(auth()->user()->store)
            <!-- Tampilkan informasi tentang toko pengguna -->
                <a class="btn btn-warning" href="/storeProfile">{{ auth()->user()->store->name }}</a>
            @else
                <!-- Tampilkan pesan jika pengguna belum memiliki toko -->
                <a class="btn btn-warning" href="/store">Create Store</a>
            @endif
        @endauth

        @unless (Auth::check())
            <a href="/" class="btn btn-primary">Login</a>
        @endunless
    </div>
    {{-- shopping cart start --}}
    <div class="shopping-cart">
      <div class="cart-item">
        <img src="{{ asset('image/productdummy.jpg') }}" alt="product">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30k</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="{{ asset('image/productdummy.jpg') }}" alt="product">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30k</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
      <div class="cart-item">
        <img src="{{ asset('image/productdummy.jpg') }}" alt="product">
        <div class="item-detail">
          <h3>Product 1</h3>
          <div class="item-price">IDR 30k</div>
        </div>
        <i data-feather="trash-2" class="remove-item"></i>
      </div>
    </div>
    {{-- shopping cart end --}}
</nav>