<?php
include 'includes/header_admin.php';
$total_users = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM users"))['total'];
$total_mobil = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM mobil"))['total'];
?>
<div class="main-header">
    <h1>Dashboard</h1>
    <p>Selamat datang di panel admin, <?php echo htmlspecialchars($_SESSION['nama']); ?>!</p>
</div>

<div class="dashboard-stats">
    <div class="stat-card">
        <h2>Total Pengguna</h2>
        <p><?php echo $total_users; ?></p>
    </div>
    <div class="stat-card">
        <h2>Total Mobil</h2>
        <p><?php echo $total_mobil; ?></p>
    </div>
</div>
<?php include 'includes/footer_admin.php'; ?>