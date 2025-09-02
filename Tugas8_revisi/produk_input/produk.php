<?php
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Form Input Produk</h2>
    <form action="query.php" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
        <div class="col-md-6">
            <label for="nama" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
            <div class="invalid-feedback">Nama produk wajib diisi.</div>
        </div>
        <div class="col-md-6">
            <label for="gambar" class="form-label">Gambar Produk</label>
            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            <div class="invalid-feedback">Gambar produk wajib diunggah.</div>
        </div>
        <div class="col-md-4">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" min="0" required>
            <div class="invalid-feedback">Harga wajib diisi dan harus angka.</div>
        </div>
        <div class="col-md-4">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" min="0" required>
            <div class="invalid-feedback">Stok wajib diisi dan harus angka.</div>
        </div>
        <div class="col-md-4">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select" id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Komputer & Laptop">Komputer & Laptop</option>
                <option value="Printer & Aksesoris Kantor">Printer & Aksesoris Kantor</option>
                <option value="Kamera & Fotografi">Kamera & Fotografi</option>
                <option value="Handphone & Tablet">Handphone & Tablet</option>
            </select>
            <div class="invalid-feedback">Kategori wajib dipilih.</div>
        </div>
        <div class="col-12">
            <label for="deskripsi" class="form-label">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
            <div class="invalid-feedback">Deskripsi produk wajib diisi.</div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Bootstrap validation
(function () {
  'use strict'
  var forms = document.querySelectorAll('.needs-validation')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>
