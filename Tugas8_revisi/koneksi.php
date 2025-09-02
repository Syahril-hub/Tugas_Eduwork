<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "e-commerce"; // ganti dengan nama database Anda

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo 'Koneksi berhasil!';
}

// Tutup koneksi
mysqli_close($conn);
?>