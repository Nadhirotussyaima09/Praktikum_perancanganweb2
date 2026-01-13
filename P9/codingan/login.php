<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Pengguna</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        background-color: #FBEDED;
        font-family: 'Poppins', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .card {
        background: #fff;
        width: 380px;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 6px solid #7A1C1C;
    }
    h2 {
        text-align: center;
        color: #7A1C1C;
        margin-bottom: 20px;
        font-weight: 600;
    }
    input {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
    }
    button {
        width: 100%;
        background: #7A1C1C;
        color: #fff;
        padding: 12px;
        border: none;
        font-size: 15px;
        font-weight: 500;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 10px;
    }
    button:hover {
        background: #A03030;
    }
    .link {
        text-align: center;
        margin-top: 10px;
        font-size: 14px;
    }
    a {
        color: #7A1C1C;
        text-decoration: none;
    }
</style>
</head>

<body>

<div class="card">
    <h2>Login</h2>

    <form action="proses_login.php" method="POST">

        <!-- LOGIN PAKAI EMAIL -->
        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Masuk</button>
    </form>

    <div class="link">
        Belum punya akun? <a href="register.php">Register</a>
    </div>
</div>

</body>
</html>
