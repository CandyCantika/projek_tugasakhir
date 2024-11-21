<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_user = $_GET['id'];  
    $id = intval($id_user);  
    
    $query = mysqli_query($koneksi, "DELETE FROM multi_users WHERE id=$id");

    if ($query) {
        echo "<script>";
        echo "alert('Delete Data Berhasil!');";
        echo "window.location.replace('user.php');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Delete Data Gagal!');";
        echo "window.location.replace('user.php');";
        echo "</script>";
    }
} else {
    echo "<script>";
    echo "alert('ID tidak ditemukan!');";
    echo "window.location.replace('user.php');";
    echo "</script>";
}
?>
