<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce - Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }
        .product-img {
            height: 220px;
            object-fit: cover;
        }
        .badge-sale {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #dc3545;
            color: #fff;
            font-size: 0.9rem;
            padding: 0.4em 0.8em;
            border-radius: 0.5em;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">ShopEase</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <a href="#" class="btn btn-primary ms-3">Login</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h1 class="display-5 fw-bold mb-3">Temukan Produk Terbaik Untukmu!</h1>
            <p class="lead mb-4">Belanja mudah, aman, dan nyaman di ShopEase. Dapatkan penawaran menarik setiap hari!</p>
            <form class="d-flex justify-content-center" role="search">
                <input class="form-control w-50 me-2" type="search" placeholder="Cari produk..." aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>
    </section>

    <!-- Products Grid -->
    <div class="container py-5">
        <div class="row g-4">
            <!-- Product Card Example -->
            @foreach([1,2,3,4,5,6,7,8] as $item)
            <div class="col-md-3">
                <div class="card product-card position-relative h-100">
                    <span class="badge-sale">Sale</span>
                    <img src="https://source.unsplash.com/400x300/?product,{{ $item }}" class="card-img-top product-img" alt="Product Image">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Produk Keren {{ $item }}</h5>
                        <p class="card-text text-muted mb-2">Deskripsi singkat produk yang menarik dan informatif.</p>
                        <div class="mb-2">
                            <span class="fw-bold text-primary fs-5">Rp{{ number_format(150000 + $item*10000, 0, ',', '.') }}</span>
                            <span class="text-muted text-decoration-line-through ms-2">Rp{{ number_format(200000 + $item*10000, 0, ',', '.') }}</span>
                        </div>
                        <a href="#" class="btn btn-success mt-auto">Beli Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white py-4 mt-5 border-top">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 ShopEase. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>