<?php
// INSTALLER OTOMATIS
// Akses file ini di browser: localhost/pengaduan_online/database/database.php

$host = "localhost";
$user = "root";
$pass = "";

// 1. Koneksi ke XAMPP
$conn = mysqli_connect($host, $user, $pass);
if (!$conn) { die("Gagal koneksi ke server XAMPP: " . mysqli_connect_error()); }

// 2. Buat Database
$db_name = "db_pengaduan";
$sql_db = "CREATE DATABASE IF NOT EXISTS $db_name";
if (mysqli_query($conn, $sql_db)) {
    echo "Database '$db_name' berhasil dibuat/diakses.<br>";
} else {
    die("Gagal buat database: " . mysqli_error($conn));
}

// 3. Pilih Database
mysqli_select_db($conn, $db_name);

// 4. Buat Tabel USERS
$sql_users = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    telp VARCHAR(20),
    level ENUM('admin', 'user') DEFAULT 'user'
)";
if (mysqli_query($conn, $sql_users)) echo "✔ Tabel 'users' siap.<br>";

// 5. Buat Akun Default
$cek_admin = mysqli_query($conn, "SELECT * FROM users WHERE username='admin'");
if (mysqli_num_rows($cek_admin) == 0) {
    mysqli_query($conn, "INSERT INTO users (nama, username, password, telp, level) VALUES ('Administrator', 'admin', 'admin', '08123456789', 'admin')");
    echo "Akun Admin Dibuat (User: admin, Pass: admin).<br>";
}

// 6. Buat Tabel LAPORAN
$sql_laporan = "CREATE TABLE IF NOT EXISTS laporan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nik VARCHAR(20),
    nama_pelapor VARCHAR(100),
    tempat_tinggal TEXT,
    tanggal_lahir DATE,
    jenis_kelamin VARCHAR(20),
    no_telp_aktif VARCHAR(20),
    judul_laporan VARCHAR(200),
    isi_laporan TEXT,
    tgl_kejadian DATE,
    lokasi_kejadian VARCHAR(255),
    instansi_tujuan VARCHAR(100),
    foto VARCHAR(255),
    status ENUM('Pending', 'Sedang Diverifikasi', 'Proses', 'Selesai') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";
if (mysqli_query($conn, $sql_laporan)) echo "✔ Tabel 'laporan' siap.<br>";

echo "<hr><h3 style='color:green'>INSTALASI SUKSES!</h3>";
echo "<a href='../index.php' style='padding:10px 20px; background:#D32F2F; color:white; text-decoration:none; border-radius:5px;'>MASUK KE APLIKASI SEKARANG</a>";
?>