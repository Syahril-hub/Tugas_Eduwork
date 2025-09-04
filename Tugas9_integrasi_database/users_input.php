<?php
// Include koneksi ke database
include 'koneksi.php';

// Proses simpan data jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (nama, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nama, $email, $password);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Data berhasil disimpan!</div>';
    } else {
        echo '<div class="alert alert-danger">Gagal menyimpan data!</div>';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<?php
// Validasi input sebelum proses simpan
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['nama'])) {
        $errors[] = "Nama wajib diisi.";
    }
    if (empty($_POST['email'])) {
        $errors[] = "Email wajib diisi.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }
    if (empty($_POST['password'])) {
        $errors[] = "Password wajib diisi.";
    } elseif (strlen($_POST['password']) < 6) {
        $errors[] = "Password minimal 6 karakter.";
    }

    // Tampilkan error jika ada
    if (!empty($errors)) {
        echo '<div class="alert alert-danger"><ul>';
        foreach ($errors as $error) {
            echo '<li>' . htmlspecialchars($error) . '</li>';
        }
        echo '</ul></div>';
    }
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Input Data Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Form Input Data Users</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>