<?php
include "koneksi.php";
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$username = mysqli_real_escape_string($conn, $_POST['username']);
$email    = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// cek email
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Email sudah terdaftar');window.location='register.php';</script>";
    exit;
}

// token verifikasi
$token = md5(uniqid());

// simpan ke database
$q = mysqli_query($conn, "
    INSERT INTO users (username, email, password, token, is_verified)
    VALUES ('$username', '$email', '$password', '$token', 0)
");

if (!$q) {
    echo "Gagal menyimpan data ke database";
    exit;
}

// kirim email verifikasi
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '';
    $mail->Password   = ''; // app password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('sayatasia854@gmail.com', 'Registrasi Akun');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Verifikasi Akun';
    $mail->Body = "
        Halo <b>$username</b>,<br><br>
        Terima kasih telah mendaftar.<br>
        Klik link berikut untuk verifikasi akun Anda:<br><br>
        <a href='http://localhost/db_rumah_sakit/verifikasi.php?token=$token'>
            Verifikasi Akun
        </a>
    ";

    $mail->send();

    echo "<script>
        alert('Registrasi berhasil. Silakan cek email untuk verifikasi.');
        window.location='login.php';
    </script>";

} catch (Exception $e) {
    echo "Email gagal dikirim: {$mail->ErrorInfo}";
}
