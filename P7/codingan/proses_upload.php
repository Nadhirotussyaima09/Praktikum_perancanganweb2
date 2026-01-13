<?php
include "koneksi.php";

$id = $_POST['id_pasien'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

$ext = strtolower(pathinfo($foto, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png'];

if (!in_array($ext, $allowed)) {
    echo "Format file tidak valid!";
    exit();
}

// ---- ambil data pasien untuk hapus file lama ----
$q = mysqli_query($conn, "SELECT foto FROM pasien WHERE id_pasien='$id'");
$data = mysqli_fetch_assoc($q);
$foto_lama = $data['foto'];

// ---- hapus file lama kalau ada ----
if($foto_lama != "" && file_exists("uploads/$foto_lama")){
    unlink("uploads/$foto_lama");
}

// ---- buat nama file BARU tanpa timestamp agar mudah dicek ----
$nama_file = $id . "_" . $foto; // contoh: 273890_Ariel Tatum.jpg

// ---- pindahkan file ----
move_uploaded_file($tmp, "uploads/" . $nama_file);

// ---- update database ----
mysqli_query($conn, "UPDATE pasien SET foto='$nama_file' WHERE id_pasien='$id'");

echo "<script>alert('Foto berhasil diupload!'); window.location='pasien.php';</script>";
?>
