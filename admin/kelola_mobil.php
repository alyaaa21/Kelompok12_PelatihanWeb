<?php include 'includes/header_admin.php'; ?>

<div class="main-header">
    <h1>Kelola Mobil</h1>
    <p>Tambah, edit, atau hapus data mobil di sini.</p>
</div>

<?php

if (isset($_GET['status'])) {
    $status_message = '';
    if ($_GET['status'] == 'sukses') {
        $status_message = 'Data mobil berhasil ditambahkan!';
    } elseif ($_GET['status'] == 'updatesukses') {
        $status_message = 'Data mobil berhasil diperbarui!';
    } elseif ($_GET['status'] == 'hapussukses') {
        $status_message = 'Data mobil berhasil dihapus!';
    }
    
    if ($status_message) {
        echo '<div class="success-message">' . $status_message . '</div>';
    }
}
?>

<div class="card">
    <div class="card-header">
        <h2>Tambah Mobil Baru</h2>
    </div>
    <div class="card-body">
        <form action="proses_tambah_mobil.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nama Mobil</label>
                <input type="text" name="nama_mobil" required>
            </div>
            <div class="form-group">
                <label>Tipe</label>
                <input type="text" name="tipe" placeholder="Contoh: MPV, SUV" required>
            </div>
            <div class="form-group">
                <label>Harga Sewa / hari (Rp)</label>
                <input type="number" name="harga_sewa" required>
            </div>
            <div class="form-group">
                <label>Gambar</label>
                <input type="file" name="gambar" required>
            </div>
            <button type="submit" class="btn-primary">Tambah Mobil</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Daftar Mobil</h2>
    </div>
    <div class="card-body">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama Mobil</th>
                    <th>Tipe</th>
                    <th>Harga Sewa</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($koneksi, "SELECT * FROM mobil ORDER BY id DESC");
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="../assets/<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['nama_mobil']); ?>" width="100" style="border-radius: 4px;"></td>
                    <td><?php echo htmlspecialchars($row['nama_mobil']); ?></td>
                    <td><?php echo htmlspecialchars($row['tipe']); ?></td>
                    <td>Rp <?php echo number_format($row['harga_sewa']); ?></td>
                    <td>
                        <a href="edit_mobil.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                        <a href="proses_hapus_mobil.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus data mobil ini?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer_admin.php'; ?>