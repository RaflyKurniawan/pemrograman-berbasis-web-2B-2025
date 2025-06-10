<!-- dashboard.php -->
 
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="bg-primary text-white p-4 rounded-3 shadow-sm text-center">
        <h2>Dashboard Manajemen Karyawan</h2>
        <p>Selamat datang, <strong><?= $_SESSION['username'] ?></strong></p>
    </div>
    <br>

    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <a href="data_karyawan.php" class="btn btn-outline-success w-100 p-4 shadow-sm">
                <h4>📋 Data Karyawan</h4>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="data_absensi.php" class="btn btn-outline-info w-100 p-4 shadow-sm">
                <h4>🕒 Data Absensi</h4>
            </a>
        </div>
        <div class="col-md-4 mb-3">
            <a href="logout.php" class="btn btn-outline-danger w-100 p-4 shadow-sm">
                <h4>🚪 Logout</h4>
            </a>
        </div>
    </div>
</body>
</html>
