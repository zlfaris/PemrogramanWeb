<?php
session_start();
// Jika session status bukan login, lempar ke halaman login
if(!isset($_SESSION['status']) || $_SESSION['status'] != "login"){
    header("location:../authentikasi/login.php");
    exit();
}
?>