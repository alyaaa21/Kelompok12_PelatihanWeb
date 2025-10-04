<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In - RentCar</title><link rel="stylesheet" href="../css/style.css">
</head>
<body class="auth-body-full">
    <div class="auth-container-center">
        <a href="index.php" class="logo">
            <img src="../assets/logo.jpg" alt="Logo RentCar" /><span class="logo-text">RentCar</span>
        </a>
        <h2>Selamat Datang Kembali</h2>
        <p>Silakan masukkan detail Anda untuk masuk.</p>
        
        <?php
        if (isset($_GET['error'])) { echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>'; }
        if (isset($_GET['success'])) { echo '<p class="success-message">' . htmlspecialchars($_GET['success']) . '</p>'; }
        ?>
        
        <form action="../proses_login.php" method="POST" class="auth-form">
            <div class="form-group"><label for="email">Email</label><input type="email" id="email" name="email" required></div>
            <div class="form-group"><label for="password">Password</label><input type="password" id="password" name="password" required></div>
            <button type="submit" class="btn-primary">Log in</button>
        </form>
        
        <div class="auth-footer">
            <p>Belum punya akun? <a href="signup.php">Daftar di sini</a></p>
        </div>
    </div>
</body>
</html>