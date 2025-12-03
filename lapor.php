<?php include 'authentikasi/cek_login.php'; include 'config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Lapor - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link active" href="lapor.php">LAPOR</a></li>
        <li class="nav-item"><a class="nav-link" href="laporan_list.php">LIHAT PENGADUAN</a></li>
      </ul>
      <a href="authentikasi/logout.php" class="btn btn-sm btn-light text-danger fw-bold">KELUAR</a>
  </div>
</nav>

<div class="hero-header"><div class="container"><h3>Formulir Pengaduan</h3></div></div>

<div class="container pb-5" style="margin-top: 20px;">
    <div class="card card-overlap">
        <div class="card-header card-header-custom p-3">Sampaikan Laporan Anda</div>
        <div class="card-body p-4">
            
            <form action="laporan_update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="insert">
                
                <h6 class="fw-bold text-danger">Identitas Pelapor</h6>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control" required placeholder="Nomor KTP">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_pelapor" class="form-control" value="<?= $_SESSION['nama']; ?>" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tempat Tinggal</label>
                        <input type="text" name="tempat_tinggal" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select">
                            <option>Laki-laki</option>
                            <option>Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">No. Telp Aktif</label>
                        <input type="number" name="no_telp_aktif" class="form-control" required>
                    </div>
                </div>

                <hr>

                <h6 class="fw-bold text-danger">Detail Laporan</h6>
                <div class="mb-3">
                    <label class="form-label">Judul Laporan</label>
                    <input type="text" name="judul_laporan" class="form-control" placeholder="Contoh: Jalan Berlubang di Jl. Sudirman" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi Laporan</label>
                    <textarea name="isi_laporan" class="form-control" rows="5" placeholder="Ceritakan kronologi kejadian..." required></textarea>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Kejadian</label>
                        <input type="date" name="tgl_kejadian" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Lokasi Kejadian</label>
                        <input type="text" name="lokasi_kejadian" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Instansi Tujuan</label>
                    <select name="instansi_tujuan" class="form-select">
                        <option value="Dinas Kesehatan">Dinas Kesehatan</option>
                        <option value="Dinas Pekerjaan Umum">Dinas Pekerjaan Umum</option>
                        <option value="Kepolisian">Kepolisian</option>
                        <option value="Pemerintah Desa">Pemerintah Desa</option>
                    </select>
                </div>

                <div class="mb-4 p-3 border rounded bg-light">
                    <label class="form-label fw-bold">Upload Bukti Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*" onchange="previewImage(this)">
                    <div id="preview-container" style="display:none; margin-top:10px;">
                        <img id="preview-img" src="#" style="max-height: 150px; border-radius:5px;">
                    </div>
                </div>

                <button type="submit" class="btn btn-custom w-100 py-2 fs-5">KIRIM LAPORAN</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>