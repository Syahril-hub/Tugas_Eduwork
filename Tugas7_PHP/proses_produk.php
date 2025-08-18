<?php
// Ambil data dari form
$nama_produk = trim($_POST['nama_produk']);
$deskripsi   = trim($_POST['deskripsi']);
$harga       = trim($_POST['harga']);
$kategori    = trim($_POST['kategori']);

// Array untuk menampung error
$errors = [];

// Validasi sederhana
if (empty($nama_produk)) {
    $errors[] = "Nama produk wajib diisi.";
}

if (empty($deskripsi)) {
    $errors[] = "Deskripsi wajib diisi.";
}

if (empty($harga) || !is_numeric($harga) || $harga <= 0) {
    $errors[] = "Harga harus berupa angka dan lebih dari 0.";
}

if (empty($kategori)) {
    $errors[] = "Kategori wajib dipilih.";
}

// Cek apakah ada error
if (!empty($errors)) {
    echo "<h3>Terjadi Kesalahan:</h3><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul><a href='form_produk.php'>Kembali</a>";
} else {
    // Jika validasi lolos, tampilkan data
    echo "<h3>Data Produk Berhasil Disimpan</h3>";
    echo "Nama Produk: $nama_produk <br>";
    echo "Deskripsi: $deskripsi <br>";
    echo "Harga: Rp " . number_format($harga, 0, ',', '.') . "<br>";
    echo "Kategori: $kategori <br>";
}
?>
