<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Foto Pasien</title>
<style>
body { font-family:Poppins;background:#FBEDED;padding:30px;color:#7A1C1C; }
table { width:100%; border-collapse:collapse; background:white; }
th, td { border:1px solid #ddd;padding:10px;text-align:center; }
img { height:100px; }
a { text-decoration:none;color:#7A1C1C; }
</style>
</head>
<body>

<h2>Foto Pasien</h2>
<a href="upload_foto.php">+ Upload Foto</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id_pasien ASC");
while($d = mysqli_fetch_assoc($q)){
?>
<tr>
    <td><?= $d['id_pasien'] ?></td>
    <td><?= $d['nm_pasien'] ?></td>
    <td>
        <?php if($d['foto'] != "") { ?>
            <img src="uploads/<?= $foto ?>">
        <?php } else echo "<i>Belum ada foto</i>"; ?>
    </td>
    <td>
        <a href="hapus_foto.php?id=<?= $d['id_pasien'] ?>" onclick="return confirm('Hapus foto?')">Hapus Foto</a>
    </td>
</tr>

<?php } ?>
</table>

</body>
</html>
