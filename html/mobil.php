<?php 
include '../config/koneksi.php';
include '../includes/header.php'; 
?>
<main class="mobil-page">
    <div class="container">
        <div class="mobil-header">
            <p>Sewa</p>
            <h1>Pilihan Mobil</h1>
            <p>Temukan mobil sewa terbaik untuk kebutuhan Anda</p>
        </div>
        <div class="mobil-grid">
            <?php
            $query = "SELECT * FROM mobil";
            $result = mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="mobil-card">
                        <div class="mobil-card-image">
                            <img src="../assets/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama_mobil']); ?>">
                        </div>
                        <div class="mobil-card-content">
                            <h3><?php echo htmlspecialchars($row['nama_mobil']); ?></h3>
                            <p class="mobil-tipe"><?php echo htmlspecialchars($row['tipe']); ?></p>
                            <p class="mobil-harga">Rp <?php echo number_format($row['harga_sewa'], 0, ',', '.'); ?> / hari</p>
                            <a href="https://wa.me/6281234567890?text=Halo,%20saya%20tertarik%20untuk%20menyewa%20mobil%20<?php echo urlencode($row['nama_mobil']); ?>" target="_blank" class="btn-primary">Pesan via WhatsApp</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>Tidak ada mobil yang tersedia saat ini.</p>";
            }
            ?>
        </div>
    </div>
</main>
<?php include '../includes/footer.php'; ?>