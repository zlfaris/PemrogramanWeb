<?php include 'authentikasi/cek_login.php'; include 'config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container">
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="home.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="lapor.php">LAPOR</a></li>
        <li class="nav-item"><a class="nav-link" href="laporan_list.php">LIHAT PENGADUAN</a></li>
      </ul>
      <div class="d-flex align-items-center">
          <span class="text-white me-3 fw-bold">Halo, <?php echo $_SESSION['nama']; ?></span>
          <a href="authentikasi/logout.php" class="btn btn-sm btn-light text-danger fw-bold">KELUAR</a>
      </div>
    </div>
  </div>
</nav>

<div class="hero-header">
    <div class="container">
        <h2 class="fw-bold">Layanan Aspirasi dan Pengaduan Online Rakyat</h2>
        <p class="mt-2">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</p>
    </div>
</div>

<div class="container mt-5 pt-5">
    <div class="row text-center mb-5">
        <h3 class="fw-bold text-danger mb-4">Alur Pengaduan</h3>
        <div class="col-md-3">
            <i class="fas fa-edit fa-3x text-danger mb-3"></i>
            <h5>1. Tulis Laporan</h5>
            <small class="text-muted">Laporkan keluhan anda dengan jelas dan lengkap.</small>
        </div>
        <div class="col-md-3">
            <i class="fas fa-share fa-3x text-danger mb-3"></i>
            <h5>2. Verifikasi</h5>
            <small class="text-muted">Laporan akan diverifikasi oleh admin dalam 3 hari.</small>
        </div>
        <div class="col-md-3">
            <i class="fas fa-comments fa-3x text-danger mb-3"></i>
            <h5>3. Tindak Lanjut</h5>
            <small class="text-muted">Instansi terkait menindaklanjuti laporan anda.</small>
        </div>
        <div class="col-md-3">
            <i class="fas fa-check-circle fa-3x text-danger mb-3"></i>
            <h5>4. Selesai</h5>
            <small class="text-muted">Laporan selesai ditangani.</small>
        </div>
    </div>

    <div class="text-center mb-5">
        <a href="lapor.php" class="btn btn-custom px-5 py-3 fs-5 shadow">BUAT LAPORAN SEKARANG</a>
    </div>
</div>

</body>
</html>