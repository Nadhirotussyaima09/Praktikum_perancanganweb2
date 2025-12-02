<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo TIPE DATA</title>
</head>
<body>

<h2>Contoh Tipe Data dan Casting</h2>

<?php
// Variabel dengan berbagai tipe data
$nama = "Tasya";
$umur = 19;
$tinggi = 158;
$mahasiswa = true;

// Menampilkan tipe data
echo "Nama (String): $nama <br>";
echo "Umur (Integer): $umur <br>";
echo "Tinggi (Float): $tinggi cm<br>";
echo "Mahasiswa (Boolean): " . ($mahasiswa ? "Ya" : "Tidak") . "<br><br>";

// Contoh casting tipe data
$angka_string = "25";          // String
$angka_integer = (int)$angka_string; // Diubah menjadi integer

echo "Nilai sebelum casting (string): $angka_string<br>";
echo "Nilai setelah casting (integer): $angka_integer";
?>

</body>
</html>
