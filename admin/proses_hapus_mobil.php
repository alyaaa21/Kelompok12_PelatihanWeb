<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') { exit('Akses Ditolak'); }

$id = (int)$_GET['id'];

$q = mysqli_query($koneksi, "SELECT gambar FROM mobil WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
if ($data && file_exists("../assets/mobil/" . $data['gambar'])) {
    unlink("../assets/mobil/" . $data['gambar']);
}

mysqli_query($koneksi, "DELETE FROM mobil WHERE id='$id'");
header('Location: kelola_mobil.php?status=hapussukses');
?>