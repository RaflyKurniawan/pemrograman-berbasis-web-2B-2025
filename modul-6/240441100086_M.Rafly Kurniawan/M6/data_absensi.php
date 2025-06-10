<!-- data_absensi.php -->

<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$result = $conn->query("SELECT a.*, k.nama FROM absensi a JOIN karyawan k ON a.nip = k.nip ORDER BY a.tanggal DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <center>
    <div class="bg-primary text-white p-3 rounded-2 shadow-sm"><h2>Data Absensi Karyawan</h2></div>
    <br>
    <a href="input_absensi.php" class="btn btn-success mb-3">+ Input Absensi</a>
    <a href="data_karyawan.php" class="btn btn-secondary mb-3">Kembali</a>
    </center>

    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>Tanggal</th><th>NIP</th><th>Nama</th><th>Jam Masuk</th><th>Jam Pulang</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['nip'] ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['jam_masuk'] ?></td>
                <td><?= $row['jam_pulang'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
