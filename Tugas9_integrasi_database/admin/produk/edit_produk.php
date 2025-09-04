<?php
include '../../koneksi.php';

// Koneksi ulang ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "e-commerce";
$conn = mysqli_connect($host, $user, $password, $database);

// Ambil data produk berdasarkan ID
$id = intval($_GET['id'] ?? 0);
$sql = "SELECT * FROM products WHERE id=$id";
$result = mysqli_query($conn, $sql);
$produk = mysqli_fetch_assoc($result);

if (!$produk) {
    echo '<div class="alert alert-danger mt-4">Produk tidak ditemukan.</div>';
    echo '<a href="tabel_produk.php" class="btn btn-secondary mt-3">Kembali ke Tabel Produk</a>';
    exit;
}

// Proses update data produk
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $harga = intval($_POST['harga'] ?? 0);
    $stok = intval($_POST['stok'] ?? 0);
    $kategori = trim($_POST['kategori'] ?? '');
    $deskripsi = trim($_POST['deskripsi'] ?? '');
    $gambar_lama = $produk['gambar'];
    $gambar_baru = $gambar_lama;
    $errors = [];

    // Validasi
    if ($nama === '') $errors[] = 'Nama produk wajib diisi.';
    if ($harga <= 0) $errors[] = 'Harga harus lebih dari 0.';
    if ($stok < 0) $errors[] = 'Stok tidak boleh negatif.';
    if ($kategori === '') $errors[] = 'Kategori wajib dipilih.';
    if ($deskripsi === '') $errors[] = 'Deskripsi wajib diisi.';

    // Proses upload gambar jika ada file baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
        $allowed = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        if (!in_array($_FILES['gambar']['type'], $allowed)) {
            $errors[] = 'Format gambar tidak didukung.';
        } else {
            $upload_dir = '../../gambar/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            $gambar_baru = time() . '_' . basename($_FILES['gambar']['name']);
            $gambar_path = $upload_dir . $gambar_baru;
            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $gambar_path)) {
                // Hapus gambar lama
                if ($gambar_lama && file_exists($upload_dir . $gambar_lama)) {
                    unlink($upload_dir . $gambar_lama);
                }
            } else {
                $errors[] = 'Upload gambar gagal.';
            }
        }
    }

    if (empty($errors)) {
        $sql_update = "UPDATE products SET nama=?, gambar=?, harga=?, deskripsi=?, stok=?, kategori=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt, "ssisisi", $nama, $gambar_baru, $harga, $deskripsi, $stok, $kategori, $id);
        if (mysqli_stmt_execute($stmt)) {
            echo '<div class="alert alert-success mt-4">Produk berhasil diupdate!</div>';
            echo '<a href="tabel_produk.php" class="btn btn-secondary mt-3">Kembali ke Tabel Produk</a>';
            exit;
        } else {
            echo '<div class="alert alert-danger mt-4">Gagal update produk: ' . mysqli_error($conn) . '</div>';
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
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Edit Produk</h2>
    <form method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin mengupdate data produk ini?');">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($produk['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Produk</label><br>
            <img src="../../gambar/<?php echo htmlspecialchars($produk['gambar']); ?>" width="100" alt="Gambar"><br>
            <input type="file" class="form-control mt-2" id="gambar" name="gambar" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" value="<?php echo $produk['harga']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" value="<?php echo $produk['stok']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Komputer & Laptop" <?php if($produk['kategori']==='Komputer & Laptop') echo 'selected'; ?>>Komputer & Laptop</option>
                <option value="Printer & Aksesoris Kantor" <?php if($produk['kategori']==='Printer & Aksesoris Kantor') echo 'selected'; ?>>Printer & Aksesoris Kantor</option>
                <option value="Kamera & Fotografi" <?php if($produk['kategori']==='Kamera & Fotografi') echo 'selected'; ?>>Kamera & Fotografi</option>
                <option value="Handphone & Tablet" <?php if($produk['kategori']==='Handphone & Tablet') echo 'selected'; ?>>Handphone & Tablet</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo htmlspecialchars($produk['deskripsi']); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Produk</button>
        <a href="tabel_produk.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
