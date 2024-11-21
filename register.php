<?php
include "koneksi.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telephone = $_POST['tlpn'];
    $alamat = $_POST['alamat'];
    $role = "user";

    if (empty($username) || empty($email) || empty($password) || empty($telephone) || empty($alamat)) {
        echo "<script>";
        echo "alert('Semua field harus diisi. Data tidak boleh kosong!');";
        echo "window.location.href = 'page_register.php';";  
        echo "</script>";
        exit();  
    }

    $stmt_check = $koneksi->prepare("SELECT * FROM multi_users WHERE nama = ? OR email = ?");
    $stmt_check->bind_param("ss", $username, $email); 
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "<script>";
        echo "alert('Nama atau Email sudah digunakan, silakan pilih nama lain!');";
        echo "window.location.href = 'page_register.php';";  
        echo "</script>";
    } else {
        $stmt_insert = $koneksi->prepare("INSERT INTO multi_users (nama, email, password, tlpn, alamat, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("ssssss", $username, $email, $password, $telephone, $alamat, $role); 

        if ($stmt_insert->execute()) {
            echo "<script>";
            echo "alert('Simpan Data Berhasil!');";
            echo "window.location.href = 'page_login.php';";  
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Simpan Data Gagal!');";
            echo "window.location.href = 'page_register.php';";  
            echo "</script>";
        }

        $stmt_insert->close();
    }

    $stmt_check->close();
}

mysqli_close($koneksi);
?>
