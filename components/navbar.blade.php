<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">🛍️ TokoKu</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
        </li>
      </ul>

      <form class="d-flex me-3" method="GET" action="{{ route('home') }}">
        <input class="form-control me-2" type="search" name="search" placeholder="Cari produk..."
          value="{{ request('search') }}">
        <button class="btn btn-outline-light" type="submit">Cari</button>
      </form>

      <a href="{{ route('cart.index') }}" class="btn btn-outline-warning position-relative">
        🛒 Keranjang
          @php
            $cartCount = count(session('cart', []));
          @endphp
          @if ($cartCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger small">
              {{ $cartCount }}
            </span>
          @endif
      </a>
    </div>
  </div>
</nav>
