<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo IF-ELSE</title>
</head>
<body>

<h2>Nilai MATEMATIKA</h2>

<?php
$nilai = 85;

// Seleksi kondisi menggunakan if else
if ($nilai >= 90) {
    echo "Nilai Anda A (Sangat Baik)";
} elseif ($nilai >= 75) {
    echo "Nilai Anda B (Baik)";
} elseif ($nilai >= 60) {
    echo "Nilai Anda C (Cukup)";
} else {
    echo "Nilai Anda D (Perlu Perbaikan)";
}
?>

</body>
</html>
