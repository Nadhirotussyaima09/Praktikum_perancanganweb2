<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo PHP + HTML</title>
</head>
<body>

<h2>Program PHP Sederhana - Biodata Mahasiswa</h2>

<?php
// Menampilkan teks pembuka
echo "Halo, selamat datang di program PHP!<br>";
echo "Hari ini tanggal: " . date("d-m-Y") . "<br><br>";

// Menyimpan data biodata ke dalam variabel
$nama       = "Anastasya Okta Ramadhani";
$nim        = "202029";
$prodi      = "Teknik Informatika";
$alamat     = "Margasari";
$politeknik = "Politeknik Purbaya";
$umur       = 19;

// Menampilkan data biodata
echo "Nama          : $nama <br>";
echo "NIM           : $nim <br>";
echo "Program Studi : $prodi <br>";
echo "Alamat        : $alamat <br>";
echo "Politeknik    : $politeknik <br>";
echo "Umur          : $umur tahun <br><br>";

// Menambahkan sedikit logika
echo "Terima kasih semuanya!<br>";
?>

</body>
</html>
