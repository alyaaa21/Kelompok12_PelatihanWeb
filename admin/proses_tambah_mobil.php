<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    exit('Akses Ditolak');
}

$nama_mobil = mysqli_real_escape_string($koneksi, $_POST['nama_mobil']);
$tipe = mysqli_real_escape_string($koneksi, $_POST['tipe']);
$harga_sewa = (int)$_POST['harga_sewa'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$lokasi_gambar = "../assets/" . basename($gambar); 

if(move_uploaded_file($tmp, $lokasi_gambar)){
    $query = "INSERT INTO mobil (nama_mobil, tipe, harga_sewa, gambar) VALUES ('$nama_mobil', '$tipe', '$harga_sewa', '$gambar')";
    mysqli_query($koneksi, $query);
    header('Location: kelola_mobil.php?status=sukses');
} else {
    echo "Gagal upload gambar";
}
?>