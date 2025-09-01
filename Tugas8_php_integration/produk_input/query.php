<?php
// query.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../koneksi.php'; // koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = trim($_POST['nama'] ?? '');
    $harga     = intval($_POST['harga'] ?? 0);
    $stok      = intval($_POST['stok'] ?? 0);
    $kategori  = trim($_POST['kategori'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $gambar    = $_FILES['gambar'] ?? null;

    $errors = [];

    // Validasi
    if ($nama === '') $errors[] = 'Nama produk wajib diisi.';
    if ($harga <= 0) $errors[] = 'Harga harus lebih dari 0.';
    if ($stok < 0) $errors[] = 'Stok tidak boleh negatif.';
    if ($kategori === '') $errors[] = 'Kategori wajib dipilih.';
    if ($deskripsi === '') $errors[] = 'Deskripsi wajib diisi.';
    if (!$gambar || $gambar['error'] !== 0) {
        $errors[] = 'Gambar wajib diunggah.';
    }

    if (empty($errors)) {
        $upload_dir = '../gambar/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $gambar_name = time() . '_' . basename($gambar['name']);
        $gambar_path = $upload_dir . $gambar_name;

        if (move_uploaded_file($gambar['tmp_name'], $gambar_path)) {
            $sql = "INSERT INTO products (nama, gambar, harga, deskripsi, stok, kategori) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ssisis",
                $nama,
                $gambar_name,
                $harga,
                $deskripsi,
                $stok,
                $kategori
            );

            if (mysqli_stmt_execute($stmt)) {
                echo '<div class="alert alert-success mt-4">Produk berhasil disimpan!</div>';
                echo '<a href="produk.php" class="btn btn-primary mt-3">Tambah Lagi</a> ';
                echo '<a href="tabel_produk.php" class="btn btn-secondary mt-3">Lihat Produk</a>';
            } else {
                echo '<div class="alert alert-danger mt-4">Gagal menyimpan produk: ' . mysqli_stmt_error($stmt) . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger mt-4">Upload gambar gagal.</div>';
        }
    } else {
        echo '<div class="alert alert-danger mt-4"><ul>';
        foreach ($errors as $err) {
            echo '<li>' . htmlspecialchars($err) . '</li>';
        }
        echo '</ul></div>';
    }
}
?>
