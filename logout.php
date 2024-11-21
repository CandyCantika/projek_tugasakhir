<?php

include 'koneksi.php';
include 'helper.php';

session_start();

if (isset($_POST['logout'])) {
    unset($_SESSION['id']);
    unset($_SESSION['role']);

    header("location: " . BASE_URL);
    exit;
}
?>
