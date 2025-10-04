<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - RentCar</title><link rel="stylesheet" href="../css/style.css">
</head>
<body class="auth-body-full" style="background-image: url('../assets/mazda3.jpg');">
    <div class="auth-container-center">
        <a href="index.php" class="logo">
            <img src="../assets/logo.jpg" alt="Logo RentCar" /><span class="logo-text">RentCar</span>
        </a>
        <h2>Buat Akun Baru</h2>
        <p>Daftar sekarang untuk mulai menyewa mobil impian Anda.</p>
        
        <?php if (isset($_GET['error'])) { echo '<p class="error-message">' . htmlspecialchars($_GET['error']) . '</p>'; } ?>
        
        <form action="../proses_registrasi.php" method="POST" class="auth-form">
            <div class="form-group"><label for="nama">Nama Lengkap</label><input type="text" id="nama" name="nama" required></div>
            <div class="form-group"><label for="email">Email</label><input type="email" id="email" name="email" required></div>
            <div class="form-group"><label for="password">Password</label><input type="password" id="password" name="password" required></div>
            <button type="submit" class="btn-primary">Daftar</button>
        </form>
        
        <div class="auth-footer">
            <p>Sudah punya akun? <a href="login.php">Masuk di sini</a></p>
        </div>
    </div>
</body>
</html>