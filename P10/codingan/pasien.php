<?php
include "koneksi.php";
include "pagination_pasien.php";

// aktifkan error saat development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Hapus data pasien
if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);
    mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien='$id'");
    header("Location: pasien.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pasien</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

<style>
body {
    font-family: Poppins;
    background: #FBEDED;
    padding: 30px;
    color: #7A1C1C;
}
h2 {
    text-align: center;
    font-weight: 600;
}
a.btn {
    background: #7A1C1C;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    margin-right: 5px;
}
a.btn:hover { background: #A03030; }

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    background: white;
    border-radius: 8px;
    overflow: hidden;
}
th {
    background: #7A1C1C;
    color: white;
    padding: 10px;
    font-size: 14px;
}
td {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 13px;
    text-align: center;
}
img { border-radius: 6px; }

.actions a {
    padding: 6px 10px;
    border-radius: 4px;
    color: white;
    text-decoration: none;
    font-size: 12px;
}
.edit { background: #A05C5C; }
.hapus { background: #D9534F; }

.pagination {
    margin-top: 20px;
    text-align: center;
}
.pagination a,
.pagination span {
    display: inline-block;
    padding: 6px 12px;
    margin: 2px;
    border-radius: 6px;
    color: white;
    background: #7A1C1C;
    text-decoration: none;
}
.pagination .active {
    background: #A03030;
}
</style>
</head>

<body>

<h2>Data Pasien</h2>

<!-- TOMBOL NAVIGASI -->
<a class="btn" href="tambah_pasien.php">+ Tambah Pasien</a>
<a class="btn" href="laporan_pasien.php">📄 Laporan Pasien</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Tgl Lahir</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Foto</th>
    <th>Aksi</th>
</tr>

<?php
if (mysqli_num_rows($data_pasien) > 0) {
    while ($data = mysqli_fetch_assoc($data_pasien)) {
?>
<tr>
    <td><?= $data['id_pasien']; ?></td>
    <td><?= $data['nm_pasien']; ?></td>
    <td><?= $data['tgl_lahir']; ?></td>
    <td><?= $data['jenis_kelamin']; ?></td>
    <td><?= $data['alamat']; ?></td>
    <td><?= $data['no_telp']; ?></td>

    <td>
        <?php if (!empty($data['foto']) && file_exists("uploads/" . $data['foto'])) { ?>
            <img src="uploads/<?= $data['foto']; ?>" width="70">
        <?php } else { ?>
            <i>Belum ada foto</i>
        <?php } ?>
    </td>

    <td class="actions">
        <a class="edit" href="edit_pasien.php?id=<?= $data['id_pasien']; ?>">Edit</a>
        <a class="hapus"
           href="pasien.php?hapus=<?= $data['id_pasien']; ?>"
           onclick="return confirm('Yakin ingin menghapus data ini?')">
           Hapus
        </a>
    </td>
</tr>
<?php
    }
} else {
?>
<tr>
    <td colspan="8"><i>Belum ada data pasien</i></td>
</tr>
<?php } ?>

</table>

<!-- PAGINATION -->
<div class="pagination">
    <?= $pagination; ?>
</div>

</body>
</html>
