<?php

include 'koneksi.php';
include 'helper.php';

$data_user = $_POST['email'];
$data_password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM multi_users WHERE email='$data_user' AND password='$data_password'");

if (mysqli_num_rows($query) != 0) {
    $row = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['nama'] = $row['nama'];

    if ($row['role'] == 'admin') {
        header("location: " . BASE_URL . 'dashboard_admin.php?page=admin');
    } else if ($row['role'] == 'user') {
        header("location: " . BASE_URL . 'dashboard_user.php?page=user');
    }
} else {
    echo "<script>";
    echo "alert('Password salah. Silakan coba lagi.');";
    echo "window.location.replace('" . BASE_URL . "');"; 
    echo "</script>";
}
?>
