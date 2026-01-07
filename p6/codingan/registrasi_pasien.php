<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once "C:/xampp/htdocs/rumah_sakit/koneksi_login.php";

if (isset($_POST['daftar'])) {

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama_pasien']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $jk       = mysqli_real_escape_string($koneksi, $_POST['jenis_kelamin']);
    $tgl_lhr  = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $alamat   = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $hp       = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    // CEK USERNAME
    $cek = mysqli_query($koneksi, "SELECT * FROM d_pasien WHERE username='$username'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Username sudah terdaftar!";
    } else {

        // GENERATE NO REKAM MEDIS
        $today = date('Ymd');
        $q = mysqli_query($koneksi, "SELECT MAX(no_rekam_medis) AS last_rm FROM d_pasien");
        $data = mysqli_fetch_assoc($q);

        if ($data['last_rm']) {
            $lastNumber = (int) substr($data['last_rm'], -3);
            $newNumber  = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $no_rm = "RM".$today.str_pad($newNumber, 3, "0", STR_PAD_LEFT);

        // INSERT DATA PASIEN
        $sql = "INSERT INTO d_pasien 
            (nama_pasien, username, password, jenis_kelamin, tanggal_lahir, alamat, no_hp, no_rekam_medis)
            VALUES
            ('$nama', '$username', '$password', '$jk', '$tgl_lhr', '$alamat', '$hp', '$no_rm')";

        if (mysqli_query($koneksi, $sql)) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Gagal menyimpan data!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pasien</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right,rgb(230, 22, 178),rgb(228, 54, 31));
        }
        .box {
            width: 420px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin: 7px 0;
        }
        button {
            background:rgb(207, 18, 27);
            border: none;
            color: white;
            cursor: pointer;
        }
        .error { color: red; text-align: center; }
        .success { color: green; text-align: center; }
    </style>
</head>
<body>

<div class="box">
    <h2 align="center">Registrasi Pasien</h2>

    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>

    <form method="post">
        <input type="text" name="nama_pasien" placeholder="Nama Lengkap" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="jenis_kelamin" required>
            <option value="">-- Jenis Kelamin --</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>

        <input type="date" name="tanggal_lahir" required>
        <textarea name="alamat" placeholder="Alamat" required></textarea>
        <input type="text" name="no_hp" placeholder="No HP" required>

        <button type="submit" name="daftar">Daftar</button>
    </form>

    <a href="login.php">Sudah punya akun? Login</a>
</div>

</body>
</html>

