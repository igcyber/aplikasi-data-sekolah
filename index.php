<?php
require_once('conn.php');

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
        $loginMessage = "Login berhasil. Redirect ke halaman lain...";
    } else {
        // Login gagal, pesan disimpan untuk ditampilkan di atas form
        $loginMessage = "Login gagal. Silakan coba lagi.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Penambahan CSS untuk div pesan */
        .login-message {
            margin-bottom: 16px;
            color: #ff0000;
            /* Warna merah untuk pesan error */
        }
    </style>
</head>

<body>
    <div>
        <div class="login-message"><?php echo $loginMessage; ?></div>
        <form action="" method="post">
            <h2>Login Form</h2>
            <hr>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>