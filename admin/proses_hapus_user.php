<?php
include '../config/koneksi.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') { exit('Akses Ditolak'); }

$id = (int)$_GET['id'];
mysqli_query($koneksi, "DELETE FROM users WHERE id='$id' AND role='user'"); // Hanya bisa hapus role 'user'
header('Location: kelola_user.php?status=hapussukses');
?>