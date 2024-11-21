<?php
include "koneksi.php";

$nama = $_POST ['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$rand = rand();
$ekstensi = array('png', 'jpg', 'jpeg');
$filename = $_FILES['paket']['name'];
$ukuran = $_FILES['paket']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if (!in_array($ext, $ekstensi)) {
  echo "<script>";
  echo "alert('Gagal Ekstensi!!!');";
  echo "window.location.replace('wisata.php')";
  echo "</script>";
}
if (!$filename) {
  $query = "INSERT INTO destinasis VALUES (null,'', '$nama', '$deskripsi', '$harga')";
} else {
  if ($ukuran < 5242880) {
    $xx = 'uploads/'. $rand . '.' . $ext;
    move_uploaded_file($_FILES['paket']['tmp_name'], 'uploads/' . $rand . '.' . $ext);
    $query = "INSERT INTO destinasis VALUES (null,'$xx', '$nama', '$deskripsi', '$harga')";
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
  echo "alert('Simpan Data Berhasil!!!');";
  echo "window.location.replace('wisata.php')";
  echo "</script>";
}else{
  echo "<script>";
        echo "alert('Simpan Data Gagal!!!');";
        echo "window.location.replace('wisata.php')";
        echo "</script>";
}
