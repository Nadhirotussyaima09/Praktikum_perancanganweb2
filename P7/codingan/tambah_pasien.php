<?php
include "koneksi.php";
error_reporting(0);

if(isset($_POST['simpan'])){

    $nama   = $_POST['nama_pasien'];
    $jk     = $_POST['jenis_kelamin'];
    $tgl    = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $hp     = $_POST['no_hp'];
    $daftar = date('Y-m-d');

    // ==== UPLOAD FOTO ====
    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto  = $_FILES['foto']['tmp_name'];

    if(!empty($nama_foto)){
        $ext = strtolower(pathinfo($nama_foto, PATHINFO_EXTENSION));
        $nama_baru = uniqid().".".$ext;
        move_uploaded_file($tmp_foto, "../uploads/".$nama_baru);
    } else {
        $nama_baru = NULL;
    }

    mysqli_query($conn,"INSERT INTO pasien 
        (nama_pasien, jenis_kelamin, tanggal_lahir, alamat, no_hp, tanggal_daftar, foto)
        VALUES
        ('$nama','$jk','$tgl','$alamat','$hp','$daftar','$nama_baru')
    ");

    header("Location: pasien.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pasien</title>
<style>
body{font-family:Poppins;background:#FBEDED;padding:30px}
form{background:#fff;padding:20px;border-radius:10px;width:400px;margin:auto}
input,select,textarea{width:100%;padding:8px;margin:6px 0}
button{background:#7A1C1C;color:#fff;padding:10px;border:none;border-radius:5px;width:100%}
</style>
</head>
<body>

<form method="POST" enctype="multipart/form-data">
    <h3 align="center">Tambah Pasien</h3>

    <input type="text" name="nama_pasien" placeholder="Nama Pasien" required>

    <select name="jenis_kelamin" required>
        <option value="">-- Jenis Kelamin --</option>
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>

    <input type="date" name="tanggal_lahir" required>

    <textarea name="alamat" placeholder="Alamat" required></textarea>

    <input type="text" name="no_hp" placeholder="No HP" required>

    <label>Foto Pasien</label>
    <input type="file" name="foto" accept="image/*">

    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>
