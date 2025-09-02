<!-- <?php

// //insert to users table
//  include 'koneksi.php'; // koneksi ke database

//  $sql = "insert into users (nama, email, password) values ('Jihan', 'jihan@mail.com', 'admin')";

//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }   

//     $conn->close(); 

$sql = "SELECT * FROM users";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["nama"]. " " . $row["email"]. $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close(); 