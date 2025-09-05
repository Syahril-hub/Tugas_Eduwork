<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Kosongkan link navbar -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4 text-center">Keranjang Belanja</h2>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <!-- Cart Table -->
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Contoh data produk -->
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://via.placeholder.com/60" class="rounded me-2" alt="Produk" width="60">
                                                <div>
                                                    <div class="fw-bold">Nama Produk</div>
                                                    <small class="text-muted">Deskripsi singkat produk</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Rp 100.000</td>
                                        <td>
                                            <input type="number" class="form-control form-control-sm w-50" value="1" min="1">
                                        </td>
                                        <td>Rp 100.000</td>
                                        <td>
                                            <button class="btn btn-danger btn-sm">Hapus</button>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan produk lain di sini -->
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Summary -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div>
                                <a href="#" class="btn btn-outline-secondary">Lanjut Belanja</a>
                            </div>
                            <div>
                                <span class="fw-bold me-2">Total:</span>
                                <span class="fs-5 text-primary">Rp 100.000</span>
                                <a href="#" class="btn btn-success ms-3">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Empty Cart Message -->
                <!--
                <div class="alert alert-info mt-4 text-center">
                    Keranjang belanja Anda kosong.
                </div>
                -->
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>