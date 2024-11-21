<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'tripease_db';

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Gagal Menyambungkan Database : " . mysqli_connect_error());
}
?>