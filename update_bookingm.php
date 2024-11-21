<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['id'])) {
    echo "User ID is not set in session!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $tgl_keluar = $_POST['tgl_keluar'];
    $durasi = $_POST['durasi'];
    $total_harga = $_POST['total_harga'];

    if (empty($id) || empty($tgl_keluar) || empty($durasi) || empty($total_harga)) {
        echo "Data tidak lengkap!";
        exit();
    }

    $query = "UPDATE order_kendaraan SET tgl_keluar = ?, durasi = ?, total_harga = ? WHERE id = ?";
    
    if ($stmt = mysqli_prepare($koneksi, $query)) {
        mysqli_stmt_bind_param($stmt, "sidi", $tgl_keluar, $durasi, $total_harga, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>";
            echo "alert('Update Data Berhasil!!!');";
            echo "window.location.replace('data_bookingk.php');"; 
            echo "</script>";
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($koneksi);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($koneksi);
    }
} else {
    echo "Invalid request method!";
}

mysqli_close($koneksi);
?>
