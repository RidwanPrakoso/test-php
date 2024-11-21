<?php
$host = "localhost"; // Atau sesuai konfigurasi server Anda
$user = "root";      // Nama pengguna database Anda
$pass = "";          // Password database (kosong untuk XAMPP default)
$db = "login"; // Nama database yang benar

$conn = new mysqli($host, $user, $pass, $db);

// Periksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
