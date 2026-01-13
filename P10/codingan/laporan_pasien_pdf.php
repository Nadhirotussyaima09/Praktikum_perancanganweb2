<?php
require_once __DIR__ . '/vendor/autoload.php';
include "koneksi.php";

$mpdf = new \Mpdf\Mpdf([
    'format' => 'A4',
    'margin_top' => 15,
    'margin_bottom' => 15
]);

$q = mysqli_query($conn, "SELECT * FROM pasien ORDER BY id_pasien ASC");

$html = '
<style>
body { font-family: sans-serif; }
h2 { text-align:center; color:#7A1C1C; }
table {
    width:100%;
    border-collapse: collapse;
    font-size:12px;
}
th {
    background:#7A1C1C;
    color:white;
    padding:8px;
}
td {
    border:1px solid #000;
    padding:6px;
    text-align:center;
}
img {
    border-radius:6px;
}
.footer {
    margin-top:20px;
    text-align:right;
    font-size:11px;
}
</style>

<h2>LAPORAN DATA PASIEN</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>JK</th>
    <th>Alamat</th>
    <th>No Telp</th>
    <th>Foto</th>
</tr>
';

$no = 1;
while ($d = mysqli_fetch_assoc($q)) {

    if (!empty($d['foto']) && file_exists(__DIR__ . "/uploads/" . $d['foto'])) {
        $foto = '<img src="' . __DIR__ . '/uploads/' . $d['foto'] . '" width="50">';
    } else {
        $foto = '-';
    }

    $html .= '
    <tr>
        <td>'.$no++.'</td>
        <td>'.$d['nm_pasien'].'</td>
        <td>'.$d['tgl_lahir'].'</td>
        <td>'.$d['jenis_kelamin'].'</td>
        <td>'.$d['alamat'].'</td>
        <td>'.$d['no_telp'].'</td>
        <td>'.$foto.'</td>
    </tr>
    ';
}

$html .= '
</table>

<div class="footer">
    Dicetak pada: '.date('d-m-Y').'
</div>
';

$mpdf->WriteHTML($html);
$mpdf->Output("laporan_pasien.pdf", "I");
