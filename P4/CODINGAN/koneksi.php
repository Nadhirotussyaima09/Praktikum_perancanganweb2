<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "rumah_sakit";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
