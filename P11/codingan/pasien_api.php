<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "koneksi.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    /* ===================== GET ===================== */
    case "GET":
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $query = mysqli_query($conn, "SELECT * FROM pasien WHERE id_pasien=$id");
            $data = mysqli_fetch_assoc($query);

            echo json_encode($data ? $data : ["message" => "Data tidak ditemukan"]);
        } else {
            $query = mysqli_query($conn, "SELECT * FROM pasien");
            $data = [];

            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = $row;
            }

            echo json_encode($data);
        }
        break;

    /* ===================== POST ===================== */
    case "POST":
        $data = json_decode(file_get_contents("php://input"), true);

        $nama   = $data['nm_pasien'];
        $tgl    = $data['tgl_lahir'];
        $jk     = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $telp   = $data['no_telp'];

        $sql = "INSERT INTO pasien 
                (nm_pasien, tgl_lahir, jenis_kelamin, alamat, no_telp)
                VALUES
                ('$nama','$tgl','$jk','$alamat','$telp')";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => true, "message" => "Data berhasil ditambahkan"]);
        } else {
            echo json_encode(["status" => false, "message" => "Gagal menambah data"]);
        }
        break;

    /* ===================== PUT ===================== */
    case "PUT":
        $data = json_decode(file_get_contents("php://input"), true);

        $id     = $data['id_pasien'];
        $nama   = $data['nm_pasien'];
        $tgl    = $data['tgl_lahir'];
        $jk     = $data['jenis_kelamin'];
        $alamat = $data['alamat'];
        $telp   = $data['no_telp'];

        $sql = "UPDATE pasien SET
                nm_pasien='$nama',
                tgl_lahir='$tgl',
                jenis_kelamin='$jk',
                alamat='$alamat',
                no_telp='$telp'
                WHERE id_pasien=$id";

        if (mysqli_query($conn, $sql)) {
            echo json_encode(["status" => true, "message" => "Data berhasil diupdate"]);
        } else {
            echo json_encode(["status" => false, "message" => "Update gagal"]);
        }
        break;

    /* ===================== DELETE ===================== */
    case "DELETE":
        $data = json_decode(file_get_contents("php://input"), true);
        $id = $data['id_pasien'];

        if (mysqli_query($conn, "DELETE FROM pasien WHERE id_pasien=$id")) {
            echo json_encode(["status" => true, "message" => "Data berhasil dihapus"]);
        } else {
            echo json_encode(["status" => false, "message" => "Hapus gagal"]);
        }
        break;

    default:
        echo json_encode(["message" => "Method tidak valid"]);
        break;
}
?>
