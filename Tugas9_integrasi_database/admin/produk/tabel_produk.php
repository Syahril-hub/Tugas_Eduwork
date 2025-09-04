<?php
include '../../koneksi.php';

// Koneksi ulang ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "e-commerce";
$conn = mysqli_connect($host, $user, $password, $database);

$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
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
    <?php include '../../navbar_admin.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">Tabel Produk</h2>
    <a href="form_input_produk.php" class="btn btn-primary mb-3">Input Produk Baru</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Gambar</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Tanggal Input</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . htmlspecialchars($row['nama']) . '</td>';
                echo '<td><img src="../../gambar/' . htmlspecialchars($row['gambar']) . '" width="80" alt="Gambar"></td>';
                echo '<td>Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>';
                echo '<td>' . $row['stok'] . '</td>';
                echo '<td>' . htmlspecialchars($row['kategori']) . '</td>';
                echo '<td>' . htmlspecialchars($row['deskripsi']) . '</td>';
                echo '<td>' . ($row['created_at'] ?? '-') . '</td>';
                echo '<td>';
                echo '<a href="edit_produk.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm me-1">Edit</a>';
                echo '<a href="hapus_produk.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus produk ini?\')">Hapus</a>';
                echo '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
