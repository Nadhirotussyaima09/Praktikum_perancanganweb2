<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien='$id'"));
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Pasien</title>
<style>
body{font-family:Poppins;background:#FBEDED;padding:30px;}
form{background:white;padding:20px;border-radius:10px;width:350px;margin:auto;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
input,textarea,select{width:100%;padding:8px;margin:6px 0;border:1px solid #aaa;border-radius:6px;}
button{background:#A03030;color:white;padding:10px;width:100%;border:none;border-radius:6px;margin-top:10px;}
</style>
</head>
<body>

<h2>Edit Data Pasien</h2>

<form method="post">
<input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>">
<input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">

<select name="jenis_kelamin">
<option value="L" <?=($data['jenis_kelamin']=='L'?'selected':'')?> >Laki-laki</option>
<option value="P" <?=($data['jenis_kelamin']=='P'?'selected':'')?> >Perempuan</option>
</select>

<textarea name="alamat"><?= $data['alamat'] ?></textarea>
<input type="text" name="no_telp" value="<?= $data['no_telp'] ?>">

<button type="submit" name="edit">Update</button>
</form>

<?php
if(isset($_POST['edit'])){
mysqli_query($conn, "UPDATE pasien SET
    nama_pasien='$_POST[nama_pasien]',
    tanggal_lahir='$_POST[tanggal_lahir]',
    jenis_kelamin='$_POST[jenis_kelamin]',
    alamat='$_POST[alamat]',
    no_telp='$_POST[no_telp]'
    WHERE id_pasien='$id'
");
echo "<script>alert('Berhasil diupdate'); window.location='pasien.php';</script>";
}
?>
</body>
</html>
