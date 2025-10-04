<?php
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password'])); 

    if (empty($nama) || empty($email) || empty($password)) {
        header('Location: html/signup.php?error=Semua field harus diisi!');
        exit();
    }

    $check_email = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $check_email);
    if (mysqli_num_rows($result) > 0) {
        header('Location: html/signup.php?error=Email sudah terdaftar!');
        exit();
    }

    $query = "INSERT INTO users (nama, email, password) VALUES ('$nama', '$email', '$password')";
    
    if (mysqli_query($koneksi, $query)) {
        header('Location: html/login.php?success=Registrasi berhasil! Silakan login.');
        exit();
    } else {
        header('Location: html/signup.php?error=Terjadi kesalahan.');
        exit();
    }
}
?>