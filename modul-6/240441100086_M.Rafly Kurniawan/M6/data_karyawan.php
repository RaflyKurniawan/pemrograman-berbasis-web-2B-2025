<!-- data_karyawan.php -->

<?php
session_start();
include 'config.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$result = $conn->query("SELECT * FROM karyawan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <center>
    <div class="bg-primary text-white p-3 rounded-2 shadow-sm"><h2>Data Karyawan</h2></div><br>
    <a href="tambah_karyawan.php" class="btn btn-success mb-3">+ Tambah Karyawan</a>
    <a href="dashboard.php" class="btn btn-danger mb-3">Kembali Ke Dashboard</a>
    <a href="data_absensi.php" class="btn btn-secondary mb-3">+ Tambah Absensi</a>
    <table class="table table-bordered">
        <thead><tr class="text-center">
            <th>NIP</th><th>Nama</th><th>Umur</th><th>Jenis Kelamin</th>
            <th>Departemen</th><th>Jabatan</th><th>Kota</th><th>Aksi</th>
        </tr></thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <center>
        <tr>
            
            <td><?= $row['nip'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['umur'] ?></td>
            <td><?= $row['jenis_kelamin'] ?></td>
            <td><?= $row['departemen'] ?></td>
            <td><?= $row['jabatan'] ?></td>
            <td><?= $row['kota_asal'] ?></td>
            <td>
                <a href="edit_karyawan.php?nip=<?= $row['nip'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_karyawan.php?nip=<?= $row['nip'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
            
        </tr>
        </center>
        <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
