<?php
$conn = mysqli_connect("localhost", "root", "", "db_pengaduan");

if (!$conn) {
    // Jika gagal koneksi, kemungkinan database belum diinstall
    echo "<div style='text-align:center; margin-top:50px;'>";
    echo "<h3>Database Belum Ditemukan!</h3>";
    echo "<p>Silakan jalankan installer terlebih dahulu.</p>";
    echo "<a href='database/database.php'>KLIK DISINI UNTUK INSTALL DATABASE</a>";
    echo "</div>";
    die(); // Hentikan proses
}
?>