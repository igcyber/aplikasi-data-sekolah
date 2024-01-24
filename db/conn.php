<?php
// Sesuaikan informasi database Anda
$host = "localhost";
$username = "root";
$password = "";
$database = "db_sekolah";


try {
    // Membuat koneksi ke database menggunakan PDO
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    // Set mode error untuk exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
