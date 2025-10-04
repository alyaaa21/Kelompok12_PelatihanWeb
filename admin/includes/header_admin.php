<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../html/login.php?error=Anda harus login sebagai admin!');
    exit();
}
include '../config/koneksi.php';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RentCar</title> <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    <div class="admin-wrapper">
        <aside class="sidebar">
            <div class="sidebar-header"><h3>Admin Panel</h3></div>
            <nav class="sidebar-nav">
                <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Dashboard</a>
                <a href="kelola_mobil.php" class="<?php echo ($current_page == 'kelola_mobil.php' || $current_page == 'edit_mobil.php') ? 'active' : ''; ?>">Kelola Mobil</a>
                <a href="kelola_user.php" class="<?php echo ($current_page == 'kelola_user.php') ? 'active' : ''; ?>">Kelola User</a>
                <a href="../logout.php">Logout</a>
            </nav>
        </aside>
        <main class="main-content">