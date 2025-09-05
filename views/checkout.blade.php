<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Halaman Checkout</h3>
        </div>
        <div class="card-body">
            <p>Ini halaman checkout sederhana. Belum ada logic backend, cuma tampilan aja.</p>

            <form>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" placeholder="Masukkan alamat"></textarea>
                </div>
                <div class="mb-3">
                    <label for="metode" class="form-label">Metode Pembayaran</label>
                    <select class="form-select" id="metode">
                        <option>Transfer Bank</option>
                        <option>COD</option>
                        <option>E-Wallet</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Pesan Sekarang</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
