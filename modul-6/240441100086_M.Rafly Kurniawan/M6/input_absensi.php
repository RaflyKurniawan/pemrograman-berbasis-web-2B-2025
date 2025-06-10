<!-- input_absensi.php -->

<?php   
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$karyawan = $conn->query("SELECT nip, nama FROM karyawan");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO absensi (nip, tanggal, jam_masuk, jam_pulang) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $_POST['nip'], $_POST['tanggal'], $_POST['jam_masuk'], $_POST['jam_pulang']);
    $stmt->execute();
    header("Location: data_absensi.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Input Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <div class="bg-success text-white p-3 rounded-2 shadow-sm"><h2>Input Absensi Karyawan</h2></div><br>
    <form method="POST">
        <div class="mb-3">
            <label>Pilih Karyawan</label>
            <select name="nip" class="form-control" required>
                <option value="">-- Pilih NIP dan Nama --</option>
                <?php while ($row = $karyawan->fetch_assoc()): ?>
                    <option value="<?= $row['nip'] ?>"><?= $row['nip'] ?> - <?= $row['nama'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Masuk</label>
            <input type="time" name="jam_masuk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jam Pulang</label>
            <input type="time" name="jam_pulang" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="data_absensi.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
