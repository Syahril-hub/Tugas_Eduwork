<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Daftar Produk</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM products ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        $no = 1;
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                echo '<td><img src="../gambar/' . htmlspecialchars($row['gambar']) . '" width="80" alt="Gambar"></td>';
                echo '<td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>';
                echo '<td>' . htmlspecialchars($row['deskripsi']) . '</td>';
                echo '<td>' . htmlspecialchars($row['stok']) . '</td>';
                echo '<td>' . htmlspecialchars($row['kategori']) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr><td colspan="7" class="text-center">Belum ada produk.</td></tr>';
        }
        ?>
        </tbody>
    </table>
    <a href="produk.php" class="btn btn-primary">Input Produk Baru</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
