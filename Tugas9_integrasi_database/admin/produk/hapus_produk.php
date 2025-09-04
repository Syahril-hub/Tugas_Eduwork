<?php
include '../../koneksi.php';

// Koneksi ulang ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "e-commerce";
$conn = mysqli_connect($host, $user, $password, $database);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    // Jika belum ada konfirmasi, tampilkan pesan konfirmasi
    if (!isset($_GET['confirm'])) {
        echo '<div class="alert alert-warning mt-4">';
        echo 'Apakah Anda yakin ingin menghapus produk ini?';
        echo '</div>';
        echo '<a href="hapus_produk.php?id=' . $id . '&confirm=1" class="btn btn-danger">Ya, Hapus</a> ';
        echo '<a href="tabel_produk.php" class="btn btn-secondary">Batal</a>';
        exit;
    }
    // Ambil nama file gambar untuk dihapus
    $getGambar = mysqli_query($conn, "SELECT gambar FROM products WHERE id=$id");
    $gambar = mysqli_fetch_assoc($getGambar)['gambar'] ?? '';
    if ($gambar && file_exists("../../gambar/$gambar")) {
        unlink("../../gambar/$gambar");
    }
    // Hapus data produk
    $sql = "DELETE FROM products WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success mt-4">Produk berhasil dihapus.</div>';
    } else {
        echo '<div class="alert alert-danger mt-4">Gagal menghapus produk.</div>';
    }
    echo '<a href="tabel_produk.php" class="btn btn-secondary mt-3">Kembali ke Tabel Produk</a>';
} else {
    echo '<div class="alert alert-danger mt-4">ID produk tidak ditemukan.</div>';
    echo '<a href="tabel_produk.php" class="btn btn-secondary mt-3">Kembali ke Tabel Produk</a>';
}
?>
