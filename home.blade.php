<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%);
            color: #fff;
            padding: 64px 0 48px 0;
            border-radius: 0 0 32px 32px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .hero-desc {
            font-size: 1.2rem;
            margin-bottom: 32px;
        }
        .feature-icon {
            font-size: 2rem;
            color: #43e97b;
        }
        .category-card {
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: transform 0.2s;
        }
        .category-card:hover {
            transform: translateY(-4px) scale(1.03);
            box-shadow: 0 4px 16px rgba(0,0,0,0.12);
        }
        .product-img-fixed {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="/">
                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9e/Tokopedia_logo_2023.svg" alt="Logo" height="32" class="me-2">Ecommerce
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/checkout">Checkout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="hero-section text-center">
        <div class="container">
            <h1 class="hero-title mb-3">Selamat Datang di Ecommerce</h1>
            <p class="hero-desc mb-4">Belanja kebutuhan Anda dengan mudah, aman, dan nyaman. Temukan produk terbaik dari berbagai kategori!</p>
            <a href="/products" class="btn btn-success btn-lg px-4">Mulai Belanja</a>
        </div>
    </section>

    <section class="container py-5">
        <h2 class="text-center fw-bold mb-4">Kenapa Belanja di Ecommerce?</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card border-0 text-center p-3 h-100">
                    <div class="feature-icon mb-2">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pengiriman Cepat</h5>
                    <p class="text-muted">Produk dikirim dengan cepat ke seluruh Indonesia.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 text-center p-3 h-100">
                    <div class="feature-icon mb-2">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Pembayaran Aman</h5>
                    <p class="text-muted">Transaksi dijamin aman dengan berbagai metode pembayaran.</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 text-center p-3 h-100">
                    <div class="feature-icon mb-2">
                        <i class="bi bi-star"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Produk Berkualitas</h5>
                    <p class="text-muted">Hanya produk pilihan dari seller terpercaya.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container pb-5">
        <h2 class="text-center fw-bold mb-4">Kategori Populer</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-3">
                <div class="card category-card text-center p-3">
                    <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/9/1/1e7e7e7e-1e7e-1e7e-1e7e-1e7e7e7e7e7e.jpg" class="mb-2 rounded" alt="Elektronik" height="80">
                    <h6 class="fw-bold">Elektronik</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card category-card text-center p-3">
                    <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/9/1/2e7e7e7e-2e7e-2e7e-2e7e-2e7e7e7e7e7e.jpg" class="mb-2 rounded" alt="Fashion" height="80">
                    <h6 class="fw-bold">Fashion</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card category-card text-center p-3">
                    <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/9/1/5e7e7e7e-5e7e-5e7e-5e7e-5e7e7e7e7e7e.jpg" class="mb-2 rounded" alt="Kesehatan" height="80">
                    <h6 class="fw-bold">Kesehatan</h6>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="card category-card text-center p-3">
                    <img src="https://images.tokopedia.net/img/cache/700/VqbcmM/2023/9/1/4e7e7e7e-4e7e-4e7e-4e7e-4e7e7e7e7e7e.jpg" class="mb-2 rounded" alt="Rumah Tangga" height="80">
                    <h6 class="fw-bold">Rumah Tangga</h6>
                </div>
            </div>
        </div>
    </section>

    <section class="container pb-5">
        <h2 class="text-center fw-bold mb-4">Produk Rekomendasi</h2>
        <div class="row g-4 justify-content-center">
            @foreach($products as $product)
                <div class="col-12 col-md-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="{{ asset($product['image']) }}" 
                            alt="{{ $product['name'] }}" 
                            class="product-img-fixed">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <h5 class="card-title fw-bold mb-2">{{ $product['name'] }}</h5>
                            <div class="mb-2 fw-bold text-success">Rp{{ number_format($product['price'], 0, ',', '.') }}</div>
                            <a href="#" class="btn btn-success mt-auto">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <footer class="bg-white text-center py-3 mt-5 border-top">
        <div class="container">
            <span class="text-muted">&copy; 2025 Ecommerce. All rights reserved.</span>
        </div>
    </footer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
