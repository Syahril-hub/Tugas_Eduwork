<?php
include 'koneksi.php';

// Ambil daftar kategori unik dari database
$kategori_query = "SELECT DISTINCT kategori FROM product";
$kategori_result = mysqli_query($conn, $kategori_query);

// Ambil kategori yang dipilih dari form (jika ada)
$selected_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';

// Query produk, filter jika kategori dipilih
if ($selected_kategori) {
    $query = "SELECT nama, gambar, harga, deskripsi, stok, kategori FROM product WHERE kategori = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $selected_kategori);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $query = "SELECT nama, gambar, harga, deskripsi, stok, kategori FROM product";
    $result = mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Daftar Produk</h2>
    <!-- Filter Form -->
    <form method="get" class="mb-4">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    <?php while($kat = mysqli_fetch_assoc($kategori_result)): ?>
                        <option value="<?php echo htmlspecialchars($kat['kategori']); ?>" <?php if($selected_kategori == $kat['kategori']) echo 'selected'; ?>>
                            <?php echo htmlspecialchars($kat['kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-auto">
                <noscript><button type="submit" class="btn btn-primary">Filter</button></noscript>
            </div>
        </div>
    </form>
    <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="gambar/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($row['nama']); ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row['nama']); ?></h5>
                    <p class="card-text"><?php echo htmlspecialchars($row['deskripsi']); ?></p>
                    <ul class="list-group list-group-flush mb-2">
                        <li class="list-group-item">Harga: Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></li>
                        <li class="list-group-item">Stok: <?php echo htmlspecialchars($row['stok']); ?></li>
                        <li class="list-group-item">Kategori: <?php echo htmlspecialchars($row['kategori']); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>
</html>