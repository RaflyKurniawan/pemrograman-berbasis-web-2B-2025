<!-- hapus_karyawan.php -->

<?php
include 'config.php';
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
$nip = $_GET['nip'];
$conn->query("DELETE FROM karyawan WHERE nip='$nip'");
header("Location: data_karyawan.php");
exit;
?>
