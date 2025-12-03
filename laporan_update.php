<?php
session_start();
include 'config/config.php';

$action = $_POST['action'];
$id = $_POST['id'] ?? ''; // ID laporan (untuk edit/update status)

// Ambil data form
$user_id = $_SESSION['id'];
$nik = $_POST['nik'] ?? '';
$nama = $_POST['nama_pelapor'] ?? '';
$tempat = $_POST['tempat_tinggal'] ?? '';
$tgl_lahir = $_POST['tanggal_lahir'] ?? '';
$jk = $_POST['jenis_kelamin'] ?? '';
$telp = $_POST['no_telp_aktif'] ?? '';
$judul = $_POST['judul_laporan'] ?? '';
$isi = $_POST['isi_laporan'] ?? '';
$tgl_kej = $_POST['tgl_kejadian'] ?? '';
$lokasi = $_POST['lokasi_kejadian'] ?? '';
$instansi = $_POST['instansi_tujuan'] ?? '';

// LOGIC UPLOAD FOTO
$foto_fix = "";
if(isset($_FILES['foto']['name']) && $_FILES['foto']['name'] != "") {
    $nama_file = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $ekstensi = strtolower(pathinfo($nama_file, PATHINFO_EXTENSION));
    
    // Validasi ekstensi
    if(in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
        $foto_fix = rand(100,999) . '-' . $nama_file; // Rename biar unik
        move_uploaded_file($tmp_file, 'assets/' . $foto_fix);
    } else {
        echo "<script>alert('Format foto harus JPG/PNG!'); window.history.back();</script>";
        exit();
    }
}

// === ACTION: INSERT (Tambah Baru) ===
if($action == 'insert') {
    $query = "INSERT INTO laporan VALUES (NULL, '$user_id', '$nik', '$nama', '$tempat', '$tgl_lahir', '$jk', '$telp', '$judul', '$isi', '$tgl_kej', '$lokasi', '$instansi', '$foto_fix', 'Pending', CURRENT_TIMESTAMP)";
    
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Laporan Berhasil Dikirim!'); window.location='laporan_list.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// === ACTION: UPDATE (Edit Data) ===
elseif($action == 'update') {
    $foto_lama = $_POST['foto_lama'];
    
    // Jika tidak upload foto baru, pakai foto lama
    if($foto_fix == "") {
        $foto_fix = $foto_lama;
    } else {
        // Jika upload baru, hapus foto lama
        if($foto_lama != "" && file_exists('assets/'.$foto_lama)){
            unlink('assets/'.$foto_lama);
        }
    }

    $query = "UPDATE laporan SET nik='$nik', nama_pelapor='$nama', tempat_tinggal='$tempat', tanggal_lahir='$tgl_lahir', jenis_kelamin='$jk', no_telp_aktif='$telp', judul_laporan='$judul', isi_laporan='$isi', tgl_kejadian='$tgl_kej', lokasi_kejadian='$lokasi', instansi_tujuan='$instansi', foto='$foto_fix' WHERE id='$id'";
    
    if(mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Diupdate!'); window.location='laporan_detail.php?id=$id';</script>";
    }
}

// === ACTION: UPDATE STATUS (Khusus Admin) ===
elseif($action == 'update_status') {
    $status_baru = $_POST['status'];
    mysqli_query($conn, "UPDATE laporan SET status='$status_baru' WHERE id='$id'");
    header("location:laporan_detail.php?id=$id");
}
?>