<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Data Pasien</title>
<style>
body {
    font-family: Arial;
    background: #ecf0f1;
}
.box {
    width: 80%;
    margin: 50px auto;
    background: white;
    padding: 30px;
    border-radius: 10px;
}
.logout {
    float: right;
}
</style>
</head>

<body>
<div class="box">
    <a class="logout" href="logout.php">Logout</a>
    <h2>Selamat Datang, <?php echo $_SESSION['username']; ?></h2>
    <p>Ini adalah halaman data pasien.</p>
</div>
</body>
</html>
