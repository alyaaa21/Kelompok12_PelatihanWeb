<?php include 'includes/header_admin.php'; ?>
<h1>Kelola Pengguna</h1>

<?php
if(isset($_GET['status']) && $_GET['status'] == 'hapussukses') {
     echo '<p class="success-message">User berhasil dihapus!</p>';
}
?>

<div class="table-container">
    <h2>Daftar Pengguna</h2>
    <table>
        <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Tanggal Daftar</th><th>Aksi</th></tr></thead>
        <tbody>
            <?php
            $result = mysqli_query($koneksi, "SELECT * FROM users ORDER BY id DESC");
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['role']); ?></td>
                <td><?php echo date('d M Y, H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <?php if($row['role'] != 'admin'): ?>
                    <a href="proses_hapus_user.php?id=<?php echo $row['id']; ?>" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include 'includes/footer_admin.php'; ?>