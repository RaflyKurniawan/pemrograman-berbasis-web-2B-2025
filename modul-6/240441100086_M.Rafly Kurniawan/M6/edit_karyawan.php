<!-- edit_karyawan.php -->

<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$nip = $_GET['nip'];
$data = $conn->query("SELECT * FROM karyawan WHERE nip='$nip'")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("UPDATE karyawan SET nama=?, umur=?, jenis_kelamin=?, departemen=?, jabatan=?, kota_asal=? WHERE nip=?");
    $stmt->bind_param("sisssss", $_POST['nama'], $_POST['umur'], $_POST['jenis_kelamin'], $_POST['departemen'], $_POST['jabatan'], $_POST['kota_asal'], $nip);
    $stmt->execute();
    header("Location: data_karyawan.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="bg-warning text-white p-3 rounded-2 shadow-sm"><h2>Edit Data Karyawan</h2></div><br>
    <form method="POST">
        <?php foreach ($data as $key => $value): if ($key == 'nip') continue; ?>
        <div class="mb-2">
            <label><?= ucfirst(str_replace('_', ' ', $key)) ?></label>
            <input type="text" name="<?= $key ?>" value="<?= $value ?>" class="form-control" required>
        </div>
        <?php endforeach; ?>
        <button class="btn btn-warning text-white">Update</button>
        <a href="data_karyawan.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
