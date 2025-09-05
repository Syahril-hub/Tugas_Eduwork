<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Ecommerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mb-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4">Welcome to Our Ecommerce</h1>
                <p class="lead">Find the best products at affordable prices. Shop now and enjoy exclusive deals!</p>
                <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/400x250?text=Ecommerce+Banner" class="img-fluid rounded" alt="Ecommerce Banner">
            </div>
        </div>
    </div>

    <!-- Product Section -->
    <div class="container mb-5">
        <h2 class="mb-4">Featured Products</h2>
        <div class="row g-4">
            <!-- Product Card 1 -->
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Product+1" class="card-img-top" alt="Product 1">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 1</h5>
                        <p class="card-text">Short description of product 1.</p>
                        <div class="mb-2"><strong>$19.99</strong></div>
                        <a href="#" class="btn btn-outline-primary w-100">Add to Cart</a>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Product+2" class="card-img-top" alt="Product 2">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 2</h5>
                        <p class="card-text">Short description of product 2.</p>
                        <div class="mb-2"><strong>$29.99</strong></div>
                        <a href="#" class="btn btn-outline-primary w-100">Add to Cart</a>
                    </div>
                </div>
            </div>
            <!-- Product Card 3 -->
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Product+3" class="card-img-top" alt="Product 3">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 3</h5>
                        <p class="card-text">Short description of product 3.</p>
                        <div class="mb-2"><strong>$39.99</strong></div>
                        <a href="#" class="btn btn-outline-primary w-100">Add to Cart</a>
                    </div>
                </div>
            </div>
            <!-- Product Card 4 -->
            <div class="col-md-3">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200?text=Product+4" class="card-img-top" alt="Product 4">
                    <div class="card-body">
                        <h5 class="card-title">Product Name 4</h5>
                        <p class="card-text">Short description of product 4.</p>
                        <div class="mb-2"><strong>$49.99</strong></div>
                        <a href="#" class="btn btn-outline-primary w-100">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4 mt-auto">
        <div class="container text-center">
            <span class="text-muted">&copy; 2024 Ecommerce. All rights reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>