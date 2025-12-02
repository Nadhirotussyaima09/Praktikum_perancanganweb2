<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo LOOPING</title>
</head>
<body>


<?php
// ===========================================
// PENGULANGAN WHILE
// ===========================================
echo "<h3>1. Pengulangan WHILE</h3>";

$angka = 1; // Inisialisasi variabel
while ($angka <= 5) { // Kondisi selama $angka ≤ 5
    echo "Perulangan ke-$angka<br>";
    $angka++; // Increment
}

// ===========================================
// PENGULANGAN DO-WHILE
// ===========================================
echo "<h3>2. Pengulangan DO-WHILE</h3>";

$x = 1;
do {
    echo "Nilai x sekarang: $x<br>";
    $x++;
} while ($x <= 5); // Kondisi dicek setelah blok dijalankan minimal 1 kali

// ===========================================
// PENGULANGAN FOR
// ===========================================
echo "<h3>3. Pengulangan FOR</h3>";

for ($i = 1; $i <= 5; $i++) {
    echo "Iterasi ke-$i<br>";
}

// ===========================================
// PENGULANGAN FOREACH
// ===========================================
echo "<h3>4. Pengulangan FOREACH</h3>";

// Contoh array data mahasiswa
$mahasiswa = [
    "Nama" => "Anastasya Okta Ramadhani",
    "NIM" => "2402029",
    "Prodi" => "Teknik Informatika",
    "Politeknik" => "Politeknik Purbaya",
    "Umur" => 19
];

// Menampilkan semua isi array menggunakan foreach
foreach ($mahasiswa as $key => $value) {
    echo "$key : $value<br>";
}

?>

</body>
</html>
