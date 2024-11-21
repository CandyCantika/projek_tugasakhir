<?php
include "koneksi.php";
session_start();

$user = isset($_SESSION['id']) ? mysqli_real_escape_string($koneksi, $_SESSION['id']) : '';
$durasi = (float)$_POST['durasi'];
$tgl_mulai = mysqli_real_escape_string($koneksi, $_POST['tgl_mulai']);
$tgl_keluar = mysqli_real_escape_string($koneksi, $_POST['tgl_keluar']);
$kendaraan = (string)$_POST['kendaraan'];
$destinasi = (string)$_POST['destinasi'];
$total_harga = (float)$_POST['total_harga'];

$result = mysqli_query($koneksi, "SELECT id FROM destinasis WHERE nama='$destinasi'");

$id_destinasi = null;
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id_destinasi = $row['id'] ?? null;
}

// echo "User: $user<br>";
// echo "Durasi: $durasi<br>";
// echo "Tanggal Mulai: $tgl_mulai<br>";
// echo "Tanggal Keluar: $tgl_keluar<br>";
// echo "destinasi: $destinasi<br>";
// echo "ID destinasi: $id_destinasi<br>";
// echo "kendaraan: $kendaraan<br>";
// echo "Total Harga: $total_harga<br>";

if (empty($user) || empty($durasi) || empty($tgl_mulai) || empty($tgl_keluar) || empty($destinasi) || empty($total_harga) || $id_destinasi === null) {
    echo "Semua field harus diisi dan destinasi harus valid!";
    exit;
}

$query = "INSERT INTO order_destinasis (id,nama, durasi, tgl_mulai, tgl_keluar, kendaraan , destinasis_id, total_harga) 
          VALUES (null, '$user', '$durasi', '$tgl_mulai', '$tgl_keluar', '$kendaraan', '$id_destinasi', '$total_harga')";

$query_execute = mysqli_query($koneksi, $query);

if ($query_execute) {
    echo "<script>";
    echo "alert('Booking Berhasil!');";
    echo "window.location.replace('wisata_user.php');";
    echo "</script>";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}
