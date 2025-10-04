<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($koneksi, trim($_POST['email']));
    $password = mysqli_real_escape_string($koneksi, trim($_POST['password']));

    if (empty($email) || empty($password)) {
        header('Location: html/login.php?error=Email dan password harus diisi!');
        exit();
    }

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        
        if ($password == $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'admin') {
                header('Location: admin/index.php');
            } else {
                header('Location: html/index.php');
            }
            exit();
        } else {
            header('Location: html/login.php?error=Password salah!');
            exit();
        }
    } else {
        header('Location: html/login.php?error=Email tidak ditemukan!');
        exit();
    }
}
?>