<?php 
include 'includes/header_admin.php'; 
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mobil WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>
<h1>Edit Data Mobil</h1>
<div class="form-container">
    <form action="proses_update_mobil.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">
        <div class="form-group"><label>Nama Mobil</label><input type="text" name="nama_mobil" value="<?php echo htmlspecialchars($data['nama_mobil']); ?>" required></div>
        <div class="form-group"><label>Tipe</label><input type="text" name="tipe" value="<?php echo htmlspecialchars($data['tipe']); ?>" required></div>
        <div class="form-group"><label>Harga Sewa / hari (Rp)</label><input type="number" name="harga_sewa" value="<?php echo $data['harga_sewa']; ?>" required></div>
        <div class="form-group">
            <label>Gambar</label>
            <img src="../assets/mobil/<?php echo $data['gambar']; ?>" width="150" style="margin-bottom:10px; display:block;">
            <input type="file" name="gambar">
            <small>Kosongkan jika tidak ingin mengubah gambar.</small>
        </div>
        <button type="submit" class="btn-primary">Update Mobil</button>
    </form>
</div>
<?php include 'includes/footer_admin.php'; ?>