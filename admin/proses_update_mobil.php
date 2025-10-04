<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') { exit('Akses Ditolak'); }

$id = (int)$_POST['id'];
$nama_mobil = mysqli_real_escape_string($koneksi, $_POST['nama_mobil']);
$tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
$harga_sewa = (int)$_POST['harga_sewa'];
$gambar_lama = $_POST['gambar_lama'];

if ($_FILES['gambar']['name'] != "") {
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $lokasi_gambar = "../assets/mobil/" . $gambar;

    if (file_exists("../assets/mobil/" . $gambar_lama)) {
        unlink("../assets/mobil/" . $gambar_lama);
    }
    move_uploaded_file($tmp, $lokasi_gambar);
    $query = "UPDATE mobil SET nama_mobil='$nama_mobil', tipe='$tipe', harga_sewa='$harga_sewa', gambar='$gambar' WHERE id='$id'";
} else {
    $query = "UPDATE mobil SET nama_mobil='$nama_mobil', tipe='$tipe', harga_sewa='$harga_sewa' WHERE id='$id'";
}

mysqli_query($koneksi, $query);
header('Location: kelola_mobil.php?status=updatesukses');
?>