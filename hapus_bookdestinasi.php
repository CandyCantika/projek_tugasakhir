<?php
include "koneksi.php";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id_wisata = intval($_GET['id']);  

    $stmt = $koneksi->prepare("DELETE FROM order_destinasis WHERE id = ?");
    $stmt->bind_param("i", $id_wisata);

    if ($stmt->execute()) {
        echo "<script>";
        echo "alert('Delete Data Berhasil!');";
        echo "window.location.replace('data_bookingw.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Delete Data Gagal!');";
        echo "window.location.replace('data_bookingw.php');";
        echo "</script>";
    }

    $stmt->close();  
    $koneksi->close();  

} else {
    $id_wisata = intval($_GET['id']);  
    echo "<script>
          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'hapus_bookdestinasi.php?confirm=yes&id=$id_wisata';
          } else {
            window.location.href = 'data_bookingw.php';
          }
        </script>";
}
?>
