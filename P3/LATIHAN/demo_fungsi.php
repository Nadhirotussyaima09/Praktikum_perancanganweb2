<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo FUNGSI</title>
</head>
<body>


<?php
// Membuat fungsi untuk menampilkan salam
function salam($nama) {
    return "Halo, $nama! Selamat datang di PHP.<br>";
}

// Fungsi untuk menghitung luas persegi
function luasPersegi($sisi) {
    return $sisi * $sisi;
}

// Memanggil fungsi
echo salam("Anastasya");
echo "Luas persegi dengan sisi 12 adalah: " . luasPersegi(12);
?>

</body>
</html>
