<?php
session_start();
require_once "koneksi_login_dashboard.php";

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
    $data  = mysqli_fetch_assoc($query);

    if ($data) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $data['username'];
            header("Location: dashboard_login.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Dashboard</title>
    <style>
        body {
            font-family: Arial;
            background: linear-gradient(to right, #2980b9, #6dd5fa);
            height: 100vh;
            margin: 0;
        }
        .login-box {
            width: 350px;
            background: white;
            padding: 30px;
            margin: 120px auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }
        h2 { text-align: center; }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background: #2980b9;
            color: white;
            border: none;
            cursor: pointer;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Dashboard</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">LOGIN</button>
    </form>

    <?php if ($error != "") { ?>
        <div class="error"><?= $error ?></div>
    <?php } ?>
</div>

</body>
</html>
