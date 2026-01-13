<?php
include "koneksi.php";
$q = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id_pasien ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Pasien</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
body {
    background:#FBEDED;
    font-family:Poppins;
    padding:30px;
}
h2 {
    text-align:center;
    color:#7A1C1C;
    font-weight:600;
}
a.btn {
    background:#7A1C1C;
    color:white;
    padding:8px 14px;
    border-radius:6px;
    text-decoration:none;
    margin-right:5px;
}
a.btn:hover { background:#A03030; }
table {
    width:100%;
    margin-top:20px;
    border-collapse:collapse;
    background:white;
}
th {
    background:#7A1C1C;
    color:white;
    padding:10px;
}
td {
    border:1px solid #ddd;
    padding:8px;
    text-align:center;
}
img {
    border-radius:6px;
}
</style>
</head>

<body>

<h2>Laporan Data Pasien</h2>

<a class="btn" href="pasien.php">⬅ Kembali</a>
<a class="btn" href="laporan_pasien_pdf.php" target="_blank">🖨 Cetak PDF</a>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Tgl Lahir</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Foto</th>
</tr>

<?php
$no = 1;
while ($d = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nm_pasien'] ?></td>
    <td><?= $d['tgl_lahir'] ?></td>
    <td><?= $d['jenis_kelamin'] ?></td>
    <td><?= $d['alamat'] ?></td>
    <td><?= $d['no_telp'] ?></td>
    <td>
        <?php if(!empty($d['foto']) && file_exists("uploads/".$d['foto'])) { ?>
            <img src="uploads/<?= $d['foto'] ?>" width="60">
        <?php } else { ?>
            -
        <?php } ?>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
