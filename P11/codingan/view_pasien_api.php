<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>View Data Pasien (REST API)</title>

<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f8;
    padding: 30px;
}
h2 { text-align: center; }
table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    margin-top: 20px;
}
th, td {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 14px;
    text-align: center;
}
th {
    background: #7A1C1C;
    color: white;
}
img {
    width: 70px;
    border-radius: 6px;
}
.error {
    text-align: center;
    color: red;
    margin-top: 20px;
}
</style>
</head>

<body>

<h2>Data Pasien (REST API)</h2>

<?php
$api_url = "http://localhost/rumah_sakit/API/pasien_api.php";
$response = file_get_contents($api_url);

if ($response === FALSE) {
    echo "<p class='error'>API tidak dapat diakses</p>";
    exit;
}

// ✅ API MENGEMBALIKAN ARRAY LANGSUNG
$data_pasien = json_decode($response, true);

if (!is_array($data_pasien) || count($data_pasien) === 0) {
    echo "<p class='error'>Data pasien tidak tersedia</p>";
    exit;
}
?>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Tgl Lahir</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Foto</th>
</tr>

<?php foreach ($data_pasien as $row): 
    $foto_path = "../uploads/" . trim($row['foto']);
?>
<tr>
    <td><?= htmlspecialchars($row['id_pasien']); ?></td>
    <td><?= htmlspecialchars($row['nama_pasien']); ?></td>
    <td><?= htmlspecialchars($row['tanggal_lahir']); ?></td>
    <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
    <td><?= htmlspecialchars($row['alamat']); ?></td>
    <td><?= htmlspecialchars($row['no_hp']); ?></td>
    <td>
        <?php if (!empty($row['foto']) && file_exists($foto_path)): ?>
            <img src="<?= $foto_path ?>">
        <?php else: ?>
            <i>-</i>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
