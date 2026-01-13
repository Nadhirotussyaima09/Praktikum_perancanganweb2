<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Upload Foto Pasien</title>
<style>
body { font-family:Arial;background:#FBEDED;padding:30px;color:#7A1C1C; }
form { background:white;padding:20px;border-radius:10px;width:400px;margin:auto; }
input, select { width:100%; padding:8px;margin:6px 0; }
button { background:#7A1C1C;color:white;border:0;padding:10px;border-radius:6px;width:100%; }
</style>
</head>
<body>

<h2 style="text-align:center;">Upload Foto Pasien</h2>

<form action="proses_upload.php" method="post" enctype="multipart/form-data">
  
  <label>Pilih Pasien</label>
  <select name="id_pasien" required>
    <option value="">-- Pilih Pasien --</option>
    <?php
    $q = mysqli_query($conn, "SELECT id_pasien, nm_pasien FROM pasien ORDER BY nm_pasien");
    while($d = mysqli_fetch_assoc($q)){
        echo "<option value='".$d['id_pasien']."'>".$d['nm_pasien']."</option>";
    }
    ?>
  </select>

  <label>Pilih Foto</label>
  <input type="file" name="foto" accept=".jpg,.jpeg,.png" required>

  <button type="submit">Upload</button>

</form>

</body>
</html>
