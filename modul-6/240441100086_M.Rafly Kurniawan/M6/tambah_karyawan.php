<!-- tambah_karyawan.php -->

<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO karyawan (nip, nama, umur, jenis_kelamin, departemen, jabatan, kota_asal) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissss", $_POST['nip'], $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal']);
    $stmt->execute();
    header("Location: data_karyawan.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="bg-success text-white p-3 rounded-2 shadow-sm"><h2>Tambah Karyawan</h2></div><br>
    <form method="POST">
        <?php $fields = ["nip", "nama", "umur", "jenis_kelamin", "departemen", "jabatan", "kota_asal"];
        foreach ($fields as $f): ?>
        <div class="mb-2">
            <label><?= ucfirst(str_replace('_', ' ', $f)) ?></label>
            <input type="text" name="<?= $f ?>" class="form-control" required>
        </div>
        <?php endforeach; ?>
        <button class="btn btn-success">Simpan</button>
        <a href="data_karyawan.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
