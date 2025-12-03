<?php
include 'config/config.php';
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT foto FROM laporan WHERE id='$id'");
$r = mysqli_fetch_assoc($q);

// Hapus foto fisik di folder assets
if($r['foto'] != "" && file_exists("assets/".$r['foto'])){
    unlink("assets/".$r['foto']);
}

// Hapus data di DB
mysqli_query($conn, "DELETE FROM laporan WHERE id='$id'");
header("location:laporan_list.php");
?>