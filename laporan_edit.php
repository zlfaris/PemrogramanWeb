<?php include 'authentikasi/cek_login.php'; include 'config/config.php'; 
$id = $_GET['id'];
$q = mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'");
$data = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom"><div class="container"><a class="nav-link text-white" href="laporan_detail.php?id=<?= $id ?>">Batal Edit</a></div></nav>

<div class="container mt-4 pb-5">
    <div class="card card-overlap">
        <div class="card-header card-header-custom p-3">Edit Laporan</div>
        <div class="card-body p-4">
            <form action="laporan_update.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="id" value="<?= $data['id']; ?>">
                <input type="hidden" name="foto_lama" value="<?= $data['foto']; ?>">

                <div class="row mb-3">
                    <div class="col-md-6"><label>NIK</label><input type="text" name="nik" class="form-control" value="<?= $data['nik'] ?>"></div>
                    <div class="col-md-6"><label>Nama</label><input type="text" name="nama_pelapor" class="form-control" value="<?= $data['nama_pelapor'] ?>"></div>
                </div>
                
                <div class="mb-3"><label>Judul</label><input type="text" name="judul_laporan" class="form-control" value="<?= $data['judul_laporan'] ?>"></div>
                <div class="mb-3"><label>Isi</label><textarea name="isi_laporan" class="form-control" rows="5"><?= $data['isi_laporan'] ?></textarea></div>
                
                <input type="hidden" name="tempat_tinggal" value="<?= $data['tempat_tinggal'] ?>">
                <input type="hidden" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
                <input type="hidden" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>">
                <input type="hidden" name="no_telp_aktif" value="<?= $data['no_telp_aktif'] ?>">
                <input type="hidden" name="tgl_kejadian" value="<?= $data['tgl_kejadian'] ?>">
                <input type="hidden" name="lokasi_kejadian" value="<?= $data['lokasi_kejadian'] ?>">
                <input type="hidden" name="instansi_tujuan" value="<?= $data['instansi_tujuan'] ?>">

                <div class="mb-3">
                    <label>Ganti Foto (Opsional)</label>
                    <input type="file" name="foto" class="form-control" onchange="previewImage(this)">
                    <?php if($data['foto']): ?>
                        <div class="mt-2"><small>Foto Saat ini:</small><br><img src="assets/<?= $data['foto'] ?>" width="100"></div>
                    <?php endif; ?>
                    <img id="preview-img" src="#" width="100" style="display:none; margin-top:10px;">
                </div>

                <button type="submit" class="btn btn-custom w-100">SIMPAN PERUBAHAN</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>