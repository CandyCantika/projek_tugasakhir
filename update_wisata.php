<?php
include 'layout/header.php';
include 'koneksi.php';

$nama = $_POST ['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$id = $_POST['id'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg');
$filename = $_FILES['paket']['name'];
$ukuran = $_FILES['paket']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!$filename) {
  $query = "UPDATE destinasis SET nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id=$id";
} else {
  if ($ukuran < 5242880) {
    $xx = 'uploads/'. $rand . '.' . $ext;
    move_uploaded_file($_FILES['paket']['tmp_name'], 'uploads/' . $rand . '.' . $ext);
    $query = "UPDATE destinasis SET gambar='$xx', nama='$nama', deskripsi='$deskripsi', harga='$harga' WHERE id=$id";
  } else {
    echo "<script>";
    echo "alert('Gagal Ukuran File!!!');";
    echo "window.location.replace('wisata.php')";
    echo "</script>";
  }
}

$query = mysqli_query($koneksi, $query);
if ($query) {
  echo "<script>";
  echo "alert('Update Data Berhasil!!!');";
  echo "window.location.replace('wisata.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Update Data Gagal!!!');";
        echo "window.location.replace('wisata.php')";
        echo "</script>";
}

