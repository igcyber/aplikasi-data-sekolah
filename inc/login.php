<?php


// Deklarasi variabel pesan
$loginMessage = '';

// Memastikan variabel POST yang dibutuhkan telah diset
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if (!empty($username) && !empty($password)) {
    // Melakukan query ke database untuk memeriksa keberadaan username dan password
    $query = "SELECT * FROM tbl_admin WHERE username=:username AND password=:password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Memeriksa apakah data ditemukan
    if ($stmt->rowCount() > 0) {
        // Login berhasil, arahkan pengguna ke halaman selanjutnya
        header("Location: pages/dashboard.php");
        exit();
    } else {
        // Login gagal, pesan disimpan di session untuk ditampilkan di halaman index.php
        $loginMessage = "Login gagal. Silakan coba lagi.";
    }
}
