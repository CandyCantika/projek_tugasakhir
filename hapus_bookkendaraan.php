<?php
include "koneksi.php";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id_mobil = intval($_GET['id']);  

    $stmt = $koneksi->prepare("DELETE FROM order_kendaraan WHERE id = ?");
    $stmt->bind_param("i", $id_mobil);

    if ($stmt->execute()) {
        echo "<script>";
        echo "alert('Delete Data Berhasil!');";
        echo "window.location.replace('data_bookingk.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Delete Data Gagal!');";
        echo "window.location.replace('data_bookingk.php');";
        echo "</script>";
    }

    $stmt->close();  
    $koneksi->close();  

} else {
    $id_mobil = intval($_GET['id']);  
    echo "<script>
          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'hapus_bookkendaraan.php?confirm=yes&id=$id_mobil';
          } else {
            window.location.href = 'data_bookingk.php';
          }
        </script>";
}
?>
