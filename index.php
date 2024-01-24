<?php
//Koneksi ke database
require_once('db/conn.php');
include('inc/login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <div class="login-message"><?php echo $loginMessage; ?></div>
        <form action="" method="POST">
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