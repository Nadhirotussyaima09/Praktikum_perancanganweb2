<?php
include "koneksi.php";
error_reporting(0);

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
form{background:white;padding:20px;border-radius:10px;width:380px;margin:auto;box-shadow:0 3px 10px rgba(0,0,0,0.1);}
input,textarea,select{width:100%;padding:8px;margin:6px 0;border:1px solid #aaa;border-radius:6px;}
button{background:#A03030;color:white;padding:10px;width:100%;border:none;border-radius:6px;margin-top:10px;}
img{width:80px;height:80px;border-radius:50%;object-fit:cover;margin-bottom:10px;}
</style>
</head>
<body>

<h2 align="center">Edit Data Pasien</h2>

<form method="post" enctype="multipart/form-data">

<!-- FOTO SAAT INI -->
<?php
$foto_lama = (!empty($data['foto']) && file_exists("../uploads/".$data['foto']))
            ? "../uploads/".$data['foto']
            : "../uploads/default.png";
?>
<div align="center">
    <img src="<?= $foto_lama ?>">
</div>

<input type="file" name="foto" accept="image/*">

<input type="text" name="nama_pasien" value="<?= $data['nama_pasien'] ?>" required>

<input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>

<select name="jenis_kelamin" required>
    <option value="L" <?=($data['jenis_kelamin']=='L'?'selected':'')?> >Laki-laki</option>
    <option value="P" <?=($data['jenis_kelamin']=='P'?'selected':'')?> >Perempuan</option>
</select>

<textarea name="alamat" required><?= $data['alamat'] ?></textarea>

<input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" required>

<button type="submit" name="edit">Update</button>
</form>

<?php
if(isset($_POST['edit'])){

    // ==== UPLOAD FOTO BARU (JIKA ADA) ====
    $nama_foto = $_FILES['foto']['name'];
    $tmp_foto  = $_FILES['foto']['tmp_name'];

    if(!empty($nama_foto)){
        $ext = strtolower(pathinfo($nama_foto, PATHINFO_EXTENSION));
        $foto_baru = uniqid().".".$ext;

        // hapus foto lama (kecuali default)
        if(!empty($data['foto']) && file_exists("../uploads/".$data['foto'])){
            unlink("../uploads/".$data['foto']);
        }

        move_uploaded_file($tmp_foto, "../uploads/".$foto_baru);

        $update_foto = ", foto='$foto_baru'";
    } else {
        $update_foto = "";
    }

    mysqli_query($conn, "UPDATE pasien SET
        nama_pasien='$_POST[nama_pasien]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        jenis_kelamin='$_POST[jenis_kelamin]',
        alamat='$_POST[alamat]',
        no_telp='$_POST[no_telp]'
        $update_foto
        WHERE id_pasien='$id'
    ");

    echo "<script>alert('Berhasil diupdate'); window.location='pasien.php';</script>";
}
?>

</body>
</html>
