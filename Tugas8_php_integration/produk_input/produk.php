<?php
// produk.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Form Input Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">

  <h2 class="mb-4">Tambah Produk Baru</h2>

  <form action="query.php" method="POST" enctype="multipart/form-data" class="row g-3">
    <div class="col-md-6">
      <label for="nama" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" name="nama" id="nama" required>
    </div>

    <div class="col-md-6">
      <label for="harga" class="form-label">Harga</label>
      <input type="number" class="form-control" name="harga" id="harga" required>
    </div>

    <div class="col-md-6">
      <label for="stok" class="form-label">Stok</label>
      <input type="number" class="form-control" name="stok" id="stok" required>
    </div>

    <div class="col-md-6">
      <label for="kategori" class="form-label">Kategori</label>
      <select name="kategori" id="kategori" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Pakaian">Pakaian</option>
        <option value="Makanan">Makanan</option>
      </select>
    </div>

    <div class="col-12">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" required></textarea>
    </div>

    <div class="col-12">
      <label for="gambar" class="form-label">Upload Gambar</label>
      <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" required>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Simpan Produk</button>
      <a href="tabel_produk.php" class="btn btn-secondary">Lihat Produk</a>
    </div>
  </form>

</body>
</html>
