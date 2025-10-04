<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" /> <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RentCar - Website Rental Mobil</title> <link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <header class="header">
        <div class="container">
            <a href="index.php" class="logo">
                <img src="../assets/logo.jpg" alt="Logo RentCar" /> <span class="logo-text">RentCar</span>
            </a>
            <div class="header-buttons-wrapper">
                <nav class="navigation">
                    <a href="mobil.php">Mobil Sewa</a> <a href="index.php#tentang-kami">Tentang Kami</a> <a href="index.php#kontak-kami">Kontak Kami</a>
                </nav>
                <div class="header-buttons">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span class="welcome-text">Halo, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</span>
                        <?php if ($_SESSION['role'] == 'admin'): ?>
                            <a href="../admin/index.php" class="btn-outline">Admin</a>
                        <?php endif; ?>
                        <a href="../logout.php" class="btn-primary">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn-outline">Login</a> <a href="signup.php" class="btn-primary">Daftar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>