<?php
include "koneksi.php";

$nama = $_POST ['nama'];
$plat = $_POST ['plat'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg');
$filename = $_FILES['kendaraan']['name'];
$ukuran = $_FILES['kendaraan']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
  echo "<script>";
  echo "alert('Gagal Ekstensi!!!');";
  echo "window.location.replace('kendaraan.php')";
  echo "</script>";
}
if (!$filename) {
  $query = "INSERT INTO kendaraans VALUES (null,'', '$nama', '$plat', '$deskripsi', '$harga')";
} else {
  if ($ukuran < 1044070) {
    $xx = 'uploads/'. $rand . '.' . $ext;
    move_uploaded_file($_FILES['kendaraan']['tmp_name'], 'uploads/' . $rand . '.' . $ext);
    $query = "INSERT INTO kendaraans VALUES (null,'$xx', '$nama', '$plat', '$deskripsi', '$harga')";
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
  echo "alert('Simpan Data Berhasil!!!');";
  echo "window.location.replace('kendaraan.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Simpan Data Gagal!!!');";
        echo "window.location.replace('kendaraan.php')";
        echo "</script>";
}
