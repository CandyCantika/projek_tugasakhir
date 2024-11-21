<?php
include 'layout/header.php';
include 'koneksi.php';

$nama = $_POST['nama'];
$plat = $_POST['plat'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$id = $_POST['id'];


$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg');
$filename = $_FILES['kendaraan']['name'];
$ukuran = $_FILES['kendaraan']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!$filename) {
  $query = "UPDATE kendaraans SET nama='$nama', plat='$plat',  deskripsi='$deskripsi', harga='$harga' WHERE id=$id";
} else {
  if ($ukuran < 1044070) {
    $xx = 'uploads/'. $rand . '.' . $ext;
    move_uploaded_file($_FILES['kendaraan']['tmp_name'], 'uploads/' . $rand . '.' . $ext);
    $query = "UPDATE kendaraans SET gambar='$xx', nama='$nama',  plat='$plat', deskripsi='$deskripsi', harga='$harga' WHERE id=$id";
  } else {
    echo "<script>";
    echo "alert('Gagal Ukuran File!!!');";
    echo "window.location.replace('kendaraan.php')";
    echo "</script>";
  }
}

$query = mysqli_query($koneksi, $query);
if ($query) {
  echo "<script>";
  echo "alert('Update Data Berhasil!!!');";
  echo "window.location.replace('kendaraan.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Update Data Gagal!!!');";
        echo "window.location.replace('kendaraan.php')";
        echo "</script>";
}

