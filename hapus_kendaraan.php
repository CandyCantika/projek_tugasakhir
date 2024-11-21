<?php
include "koneksi.php";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id_kendaraan = $_GET['id'];

    $kendaraan_delete = mysqli_query($koneksi, "DELETE FROM order_kendaraan WHERE kendaraan_id=$id_kendaraan");

    if ($kendaraan_delete) {
        $query = mysqli_query($koneksi, "DELETE FROM kendaraans WHERE id=$id_kendaraan");

        if ($query) {
            echo "<script>";
            echo "alert('Delete Data Berhasil!');";
            echo "window.location.replace('kendaraan.php');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Delete Data Gagal!');";
            echo "window.location.replace('kendaraan.php');";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('Gagal menghapus data terkait dari order_kendaraan!');";
        echo "window.location.replace('kendaraan.php');";
        echo "</script>";
    }
} else {
    $id_kendaraan = $_GET['id'];
    echo "<script>
          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'hapus_kendaraan.php?confirm=yes&id=$id_kendaraan';
          } else {
            window.location.href = 'kendaraan.php';
          }
        </script>";
}
?>
