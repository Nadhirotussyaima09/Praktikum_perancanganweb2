<?php
session_start();
include "koneksi.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email    = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

// cari user berdasarkan EMAIL
$q = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

if (mysqli_num_rows($q) == 0) {
    echo "<script>alert('Email tidak ditemukan');window.location='login.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($q);

// cek password
if (!password_verify($password, $data['password'])) {
    echo "<script>alert('Password salah');window.location='login.php';</script>";
    exit;
}

// cek verifikasi email
if ($data['is_verified'] == 0) {

    // buat token baru
    $token = md5(uniqid());
    mysqli_query($conn, "UPDATE users SET token='$token' WHERE id_user=".$data['id_user']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';
        $mail->Password   = ''; // app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('sayatasia854@gmail.com', 'Sistem Login');
        $mail->addAddress($data['email']);

        $mail->isHTML(true);
        $mail->Subject = 'Verifikasi Akun';
        $mail->Body    = "
            Halo <b>{$data['username']}</b>,<br><br>
            Akun Anda belum diverifikasi.<br>
            Klik link berikut untuk verifikasi akun:<br><br>
            <a href='http://localhost/db_rumah_sakit/verifikasi.php?token=$token'>
                Verifikasi Akun
            </a>
        ";

        $mail->send();

        echo "<script>
                alert('Akun belum diverifikasi. Link verifikasi telah dikirim ke email Anda.');
                window.location='login.php';
              </script>";
        exit;

    } catch (Exception $e) {
        echo "Email gagal dikirim: {$mail->ErrorInfo}";
        exit;
    }
}

/* ========= LOGIN BERHASIL ========= */
$_SESSION['user'] = $data;
header("Location: index.php");
exit;
