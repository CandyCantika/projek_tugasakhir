<?php
include "koneksi.php";
session_start();

$user = isset($_SESSION['id']) ? mysqli_real_escape_string($koneksi, $_SESSION['id']) : '';
$durasi = (float)$_POST['durasi'];
$tgl_mulai = mysqli_real_escape_string($koneksi, $_POST['tgl_mulai']);
$tgl_keluar = mysqli_real_escape_string($koneksi, $_POST['tgl_keluar']);
$kendaraan = (string)$_POST['kendaraan'];
$total_harga = (float)$_POST['total_harga'];

$result = mysqli_query($koneksi, "SELECT id FROM kendaraans WHERE nama='$kendaraan'");

$id_kendaraan = null;
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_kendaraan = $row['id'] ?? null;
}

// Debugging output
// echo "User: $user<br>";
// echo "Durasi: $durasi<br>";
// echo "Tanggal Mulai: $tgl_mulai<br>";
// echo "Tanggal Keluar: $tgl_keluar<br>";
// echo "Kendaraan: $kendaraan<br>";
// echo "ID Kendaraan: $id_kendaraan<br>";
// echo "Total Harga: $total_harga<br>";

if (empty($user) || empty($durasi) || empty($tgl_mulai) || empty($tgl_keluar) || empty($kendaraan) || empty($total_harga) || $id_kendaraan === null) {
    echo "Semua field harus diisi dan kendaraan harus valid!";
    exit;
}

$query = "INSERT INTO order_kendaraan (user, durasi, tgl_mulai, tgl_keluar, kendaraan, total_harga, kendaraan_id) 
          VALUES ('$user', '$durasi', '$tgl_mulai', '$tgl_keluar', '$kendaraan', '$total_harga', '$id_kendaraan')";

$query_execute = mysqli_query($koneksi, $query);

if ($query_execute) {
    echo "<script>";
    echo "alert('Booking Berhasil!');";
    echo "window.location.replace('kendaraan_user.php');";
    echo "</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
