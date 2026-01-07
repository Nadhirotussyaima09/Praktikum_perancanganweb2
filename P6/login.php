<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once "C:/xampp/htdocs/rumah_sakit/koneksi_login.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $query = mysqli_query(
        $koneksi,
        "SELECT * FROM users WHERE username='$username' AND password='$password'"
    );

    if ($query && mysqli_num_rows($query) > 0) {
        $_SESSION['username'] = $username;
        header("Location: pasien.php");
        exit;
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Pasien</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right,rgb(216, 74, 162),rgb(230, 37, 53));
        }
        .login-box {
            width: 350px;
            margin: 100px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(230, 169, 99, 0.2);
        }
        h2 { text-align: center; }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background:rgb(231, 59, 188);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover { background:rgb(190, 221, 52); }
        .error {
            color: red;
            text-align: center;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Pasien</h2>

    <?php if (isset($error)) : ?>
        <p class="error"><?= $error; ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>

    <a href="registrasi.php">Daftar Akun</a>
</div>

</body>
</html>
