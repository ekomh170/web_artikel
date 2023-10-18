<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "webberita";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

// echo "Koneksi Berhasil";

// Tutup koneksi
$conn->close();
?>
