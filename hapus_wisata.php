<?php
include "koneksi.php";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
    $id_wisata = $_GET['id'];

    $destinasi_delete = mysqli_query($koneksi, "DELETE FROM order_destinasis WHERE destinasis_id=$id_wisata");

    if ($destinasi_delete) {
        $query = mysqli_query($koneksi, "DELETE FROM destinasis WHERE id=$id_wisata");

        if ($query) {
            echo "<script>";
            echo "alert('Delete Data Berhasil!');";
            echo "window.location.replace('wisata.php');";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Delete Data Gagal!');";
            echo "window.location.replace('wisata.php');";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('Gagal menghapus data terkait dari order_destinasis!');";
        echo "window.location.replace('wisata.php');";
        echo "</script>";
    }
} else {
    $id_wisata = $_GET['id'];
    echo "<script>
          if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'hapus_wisata.php?confirm=yes&id=$id_wisata';
          } else {
            window.location.href = 'wisata.php';
          }
        </script>";
}
?>
