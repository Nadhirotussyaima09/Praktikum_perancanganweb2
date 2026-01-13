<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Pasien</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

<style>
body{
    font-family:Poppins;
    background:#FBEDED;
    padding:30px;
}
.card{
    background:white;
    padding:25px;
    border-radius:12px;
    width:400px;
    margin:auto;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    border-left:6px solid #7A1C1C;
}
h2{
    text-align:center;
    color:#7A1C1C;
    margin-bottom:20px;
}
input, textarea, select{
    width:100%;
    padding:10px;
    margin-bottom:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:14px;
}
button{
    background:#7A1C1C;
    color:white;
    padding:12px;
    width:100%;
    border:none;
    border-radius:8px;
    font-size:15px;
    cursor:pointer;
}
button:hover{
    background:#A03030;
}
a{
    display:block;
    text-align:center;
    margin-top:12px;
    color:#7A1C1C;
    text-decoration:none;
}
</style>
</head>

<body>

<div class="card">
<h2>Tambah Data Pasien</h2>

<form method="post" enctype="multipart/form-data">

    <input type="text" name="nm_pasien" placeholder="Nama Pasien" required>

    <input type="date" name="tgl_lahir" required>

    <select name="jenis_kelamin" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>

    <textarea name="alamat" placeholder="Alamat" required></textarea>

    <input type="text" name="no_telp" placeholder="No Telepon" required>

    <label>Foto Pasien (jpg/png)</label>
    <input type="file" name="foto" accept=".jpg,.jpeg,.png" required>

    <button type="submit" name="simpan">Simpan</button>
</form>

<a href="pasien.php">← Kembali ke Data Pasien</a>
</div>

<?php
if(isset($_POST['simpan'])){

    // FOTO
    $foto_name = $_FILES['foto']['name'];
    $foto_tmp  = $_FILES['foto']['tmp_name'];
    $ext = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));

    $allowed = ['jpg','jpeg','png'];
    if(!in_array($ext, $allowed)){
        echo "<script>alert('Format foto harus JPG / PNG');</script>";
        exit;
    }

    $nama_file = time() . "_" . $foto_name;

    // folder harus SAMA dengan pasien.php
    move_uploaded_file($foto_tmp, "uploads/" . $nama_file);

    // INSERT DATA
    $sql = mysqli_query($conn, "
        INSERT INTO pasien 
        (nm_pasien, tgl_lahir, jenis_kelamin, alamat, no_telp, foto)
        VALUES (
            '$_POST[nm_pasien]',
            '$_POST[tgl_lahir]',
            '$_POST[jenis_kelamin]',
            '$_POST[alamat]',
            '$_POST[no_telp]',
            '$nama_file'
        )
    ");

    if($sql){
        echo "<script>
            alert('Data pasien berhasil ditambahkan');
            window.location='pasien.php';
        </script>";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
