<?php
// Cek koneksi ke database dulu. Jika gagal (belum install), arahkan ke setup.
$conn = @mysqli_connect("localhost", "root", "", "db_pengaduan");
if (!$conn) {
    header("location:database/database.php");
    exit();
}

// Jika sudah ada DB, cek login
session_start();
if(isset($_SESSION['status']) && $_SESSION['status'] == "login"){
    header("location:home.php");
} else {
    header("location:authentikasi/login.php");
}
?>