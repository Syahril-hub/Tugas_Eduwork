<?php

//insert to users table
include 'koneksi.php';

// $sql = "INSERT INTO users (nama, email, password) VALUES ('Ali', 'ali@example.com', 'Ali123')";

// if (mysqli_query($conn, $sql)) {
//     echo "Data berhasil ditambahkan ke tabel users.";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Nama: " . $row["nama"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close(); // Tutup koneksi
