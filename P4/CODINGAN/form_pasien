<?php
include "koneksi.php";
error_reporting(0);

// Hapus data
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien='$id'");
    header("Location: pasien.php");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pasien</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
<style>
body { font-family:Poppins;background:#FBEDED;padding:30px;color:#7A1C1C; }
h2 { text-align:center;font-weight:600;color:#7A1C1C; }
a.btn { background:#7A1C1C;color:white;padding:8px 12px;border-radius:6px;text-decoration:none; }
a.btn:hover{ background:#A03030; }
table { width:100%; margin-top:20px; border-collapse:collapse; background:white; border-radius:8px; overflow:hidden; }
th { background:#7A1C1C;color:white;padding:10px;font-size:14px; }
td { border:1px solid #ddd;padding:10px;font-size:13px; }
.actions a { padding:6px 10px;border-radius:4px;color:white;text-decoration:none;font-size:12px;margin-right:5px; }
.edit { background:#A05C5C; }
.hapus { background:#D9534F; }
</style>
</head>
<body>

<h2>Data Pasien</h2>
<a class="btn" href="tambah_pasien.php">+ Tambah Pasien</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Tgl Lahir</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Aksi</th>
</tr>

<?php
$query = mysqli_query($conn,"SELECT * FROM pasien ORDER BY id_pasien ASC");
if(mysqli_num_rows($query) > 0){
while($data = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?= $data['id_pasien'] ?></td>
    <td><?= $data['nm_pasien'] ?></td>
    <td><?= $data['tgl_lahir'] ?></td>
    <td><?= $data['jenis_kelamin'] ?></td>
    <td><?= $data['alamat'] ?></td>
    <td><?= $data['no_telp'] ?></td>
    <td class="actions">
        <a class="edit" href="edit_pasien.php?id=<?= $data['id_pasien'] ?>">Edit</a>
        <a class="hapus" href="pasien.php?hapus=<?= $data['id_pasien'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
    </td>
</tr>

<?php }} else { ?>
<tr><td colspan="7" align="center"><i>Belum ada data</i></td></tr>
<?php } ?>

</table>

</body>
</html>
