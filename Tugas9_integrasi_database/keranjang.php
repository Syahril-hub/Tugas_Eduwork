<?php
session_start();
// Tambah produk ke keranjang
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produk_id'])) {
    $produk_id = $_POST['produk_id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $jumlah = max(1, intval($_POST['jumlah']));

    // Jika produk sudah ada di keranjang, update jumlah
    if (isset($_SESSION['keranjang'][$produk_id])) {
        $_SESSION['keranjang'][$produk_id]['jumlah'] += $jumlah;
    } else {
        $_SESSION['keranjang'][$produk_id] = [
            'nama' => $nama,
            'harga' => $harga,
            'gambar' => $gambar,
            'jumlah' => $jumlah
        ];
    }
    header('Location: keranjang.php');
    exit;
}

// Edit jumlah produk di keranjang
if (isset($_POST['edit_jumlah']) && isset($_POST['edit_id'])) {
    $edit_id = $_POST['edit_id'];
    $edit_jumlah = max(1, intval($_POST['edit_jumlah']));
    if (isset($_SESSION['keranjang'][$edit_id])) {
        $_SESSION['keranjang'][$edit_id]['jumlah'] = $edit_jumlah;
    }
    header('Location: keranjang.php');
    exit;
}

// Hapus produk dari keranjang
if (isset($_GET['hapus'])) {
    $hapus_id = $_GET['hapus'];
    unset($_SESSION['keranjang'][$hapus_id]);
    header('Location: keranjang.php');
    exit;
}

$keranjang = $_SESSION['keranjang'] ?? [];
$total = 0;
foreach ($keranjang as $item) {
    $total += $item['harga'] * $item['jumlah'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4">Keranjang Belanja</h2>
    <?php if (empty($keranjang)): ?>
        <div class="alert alert-info">Keranjang belanja kosong.</div>
        <a href="produk.php" class="btn btn-primary">Kembali ke Produk</a>
    <?php else: ?>
    <form method="post" id="formCheckout">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($keranjang as $id => $item): ?>
            <tr>
                <td><img src="gambar/<?php echo htmlspecialchars($item['gambar']); ?>" width="60" alt="Gambar"></td>
                <td><?php echo htmlspecialchars($item['nama']); ?></td>
                <td>Rp<?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
                <td>
                    <form method="post" style="display:inline-block;width:100px;">
                        <input type="hidden" name="edit_id" value="<?php echo $id; ?>">
                        <input type="number" name="edit_jumlah" min="1" value="<?php echo $item['jumlah']; ?>" class="form-control form-control-sm" style="width:60px;display:inline-block;">
                        <button type="submit" class="btn btn-info btn-sm">Update</button>
                    </form>
                </td>
                <td>Rp<?php echo number_format($item['harga'] * $item['jumlah'], 0, ',', '.'); ?></td>
                <td><a href="keranjang.php?hapus=<?php echo $id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk dari keranjang?')">Hapus</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-end">Total</th>
                <th colspan="2">Rp<?php echo number_format($total, 0, ',', '.'); ?></th>
            </tr>
        </tfoot>
    </table>
    <button type="button" class="btn btn-success" onclick="checkoutWA()">Checkout via WhatsApp</button>
    <a href="produk.php" class="btn btn-secondary">Lanjut Belanja</a>
    </form>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function checkoutWA() {
    var wa_admin = '628989339323'; // Ganti dengan nomor WA admin
    var pesan = 'Halo Admin, saya ingin membeli produk berikut:%0A';
    <?php foreach ($keranjang as $id => $item): ?>
        var link = '<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . "/produk.php?id=" . $id; ?>';
        pesan += '- <?php echo addslashes($item['nama']); ?> (<?php echo $item['jumlah']; ?> x Rp<?php echo number_format($item['harga'], 0, ',', '.'); ?>) %0ALink: ' + link + '%0A';
    <?php endforeach; ?>
    pesan += 'Total: Rp<?php echo number_format($total, 0, ',', '.'); ?>%0A';
    var url_wa = 'https://wa.me/' + wa_admin + '?text=' + pesan;
    window.open(url_wa, '_blank');
}
</script>
</body>
</html>
