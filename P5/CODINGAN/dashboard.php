<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Rumah Sakit</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #FBEDED;
        color: #4A0D0D;
        display: flex;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background: #7A1C1C;
        padding: 25px;
        min-height: 100vh;
        color: #FCE3E3;
    }
    .sidebar h2 {
        text-align: center;
        margin-bottom: 35px;
        font-weight: 600;
        font-size: 20px;
        color: #fff;
    }
    .menu a {
        display: block;
        padding: 12px;
        margin-bottom: 10px;
        border-radius: 8px;
        color: #FCE3E3;
        text-decoration: none;
        font-size: 15px;
        transition: 0.3s;
        font-weight: 500;
    }
    .menu a:hover,
    .menu a.active {
        background-color: #A03030;
        color: #fff;
    }

    /* Main */
    .main {
        flex: 1;
        padding: 30px;
    }
    .main h1 {
        font-size: 28px;
        margin-bottom: 5px;
        font-weight: 600;
        color: #7A1C1C;
    }
    .main p {
        color: #A03030;
        margin-bottom: 25px;
        font-size: 15px;
    }

    /* Grid Cards */
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .card {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: 0.3s ease;
        border-left: 6px solid #7A1C1C;
    }
    .card:hover {
        transform: translateY(-4px);
    }
    .card h3 {
        font-size: 16px;
        color: #A03030;
        font-weight: 500;
        margin-bottom: 5px;
    }
    .card .value {
        font-size: 34px;
        font-weight: 600;
        color: #7A1C1C;
    }

    /* Notifikasi */
    .notif {
        margin-top: 30px;
        background: #F4D6D6;
        color: #7A1C1C;
        padding: 20px;
        border-radius: 12px;
        border-left: 6px solid #A03030;
        font-size: 14px;
    }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>🏥 Rumah Sakit</h2>
    <div class="menu">
        <a class="active" href="index.php">Dashboard</a>
        <a href="pasien.php">Data Pasien</a>
        <a href="dokter.php">Data Dokter</a>
        <a href="poli.php">Data Poli</a>
        <a href="jadwal.php">Jadwal Praktek</a>
        <a href="pendaftaran.php">Pendaftaran</a>
        <a href="rekam_medis.php">Rekam Medis</a>
        <a href="obat.php">Data Obat</a>
        <a href="resep.php">Resep Obat</a>
        <a href="pembayaran.php">Pembayaran</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- Main Content -->
<div class="main">
    <h1>Dashboard Rumah Sakit</h1>
    <p>Selamat datang di Sistem Informasi Rumah Sakit yang terintegrasi 👨‍⚕️❤️</p>

    <!-- Statistik -->
    <div class="grid">
        <div class="card">
            <h3>Total Pasien</h3>
            <div class="value">92</div>
        </div>
        <div class="card">
            <h3>Total Dokter</h3>
            <div class="value">25</div>
        </div>
        <div class="card">
            <h3>Total Poli</h3>
            <div class="value">8</div>
        </div>
        <div class="card">
            <h3>Pendaftaran</h3>
            <div class="value">41</div>
        </div>
        <div class="card">
            <h3>Rekam Medis</h3>
            <div class="value">120</div>
        </div>
        <div class="card">
            <h3>Data Obat</h3>
            <div class="value">56</div>
        </div>
    </div>

    <!-- Notifikasi -->
    <div class="notif">
        🔔 Notifikasi : Ada pasien baru mendaftar untuk pemeriksaan hari ini.
    </div>

</div>
</body>
</html>
