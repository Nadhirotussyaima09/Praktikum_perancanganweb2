<?php
include "koneksi.php";
error_reporting(0);

if(isset($_POST['simpan'])){
    $nama = $_POST['nama_pasien'];
    $tgl = $_POST['tanggal_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['no_hp'];
    $tgl_daftar = date('Y-m-d H:i:s'); // otomatis tanggal & waktu hari ini

    $query = "INSERT INTO pasien (nama_pasien, jenis_kelamin, tanggal_lahir, alamat, no_hp, tanggal_daftar)
              VALUES ('$nama', '$jk', '$tgl', '$alamat', '$telp', '$tgl_daftar')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Data berhasil ditambahkan!'); window.location='pasien.php';</script>";
    } else {
        echo 'Gagal menambahkan data: ' . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pasien</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
<style>
body { font-family:Poppins;background:#FBEDED;padding:30px;color:#7A1C1C; }
form { background:white;padding:20px;border-radius:8px;max-width:400px;margin:auto; }
input, select, textarea { width:100%;padding:8px;margin:8px 0;border:1px solid #ccc;border-radius:6px; }
button { background:#7A1C1C;color:white;padding:10px 15px;border:none;border-radius:6px;cursor:pointer; }
button:hover { background:#A03030; }
</style>
</head>
<body>

<h2 style="text-align:center;">Tambah Data Pasien</h2>
<form method="POST">
    <label>Nama Pasien</label>
    <input type="text" name="nama_pasien" required>

    <label>Jenis Kelamin</label>
    <select name="jenis_kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" required>

    <label>Alamat</label>
    <textarea name="alamat" rows="3" required></textarea>

    <label>No. HP</label>
    <input type="text" name="no_hp" required>

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>
