<?php
session_start();
include "koneksi.php";

if (!isset($_GET['token'])) {
    echo "Token tidak ditemukan!";
    exit;
}

$token = mysqli_real_escape_string($conn, $_GET['token']);

// cari user berdasarkan token
$q = mysqli_query($conn, "SELECT * FROM users WHERE token='$token'");

if (mysqli_num_rows($q) == 0) {
    echo "Token tidak valid atau sudah digunakan!";
    exit;
}

$user = mysqli_fetch_assoc($q);

/* =============================
   AKTIFKAN AKUN
============================= */
mysqli_query($conn, "
    UPDATE users 
    SET is_verified = 1, token = ''
    WHERE id_user = {$user['id_user']}
");

/* =============================
   SET SESSION LOGIN
============================= */
$_SESSION['user'] = [
    'id_user' => $user['id_user'],
    'username' => $user['username'],
    'email' => $user['email']
];

/* =============================
   REDIRECT
============================= */
echo "<script>
        alert('Akun berhasil diverifikasi & login');
        window.location='index.php';
      </script>";
exit;
