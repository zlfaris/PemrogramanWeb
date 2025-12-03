<?php include 'authentikasi/cek_login.php'; include 'config/config.php'; 
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM laporan WHERE id='$id'");
$data = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom"><div class="container"><a class="nav-link text-white" href="laporan_list.php">< Kembali ke Daftar</a></div></nav>

<div class="container mt-4 pb-5">
    <div class="card card-overlap">
        <div class="card-header card-header-custom p-3 d-flex justify-content-between">
            <span>Detail Pengaduan</span>
            <span>Status: <span class="badge bg-warning text-dark"><?= $data['status']; ?></span></span>
        </div>
        <div class="card-body p-4">
            
            <div class="row">
                <div class="col-md-6">
                    <h5 class="fw-bold"><?= $data['judul_laporan']; ?></h5>
                    <p class="text-muted mb-4">Dilaporkan oleh: <?= $data['nama_pelapor']; ?> pada <?= $data['created_at']; ?></p>
                </div>
                
                <?php if($_SESSION['level'] == 'admin'): ?>
                <div class="col-md-6 text-end">
                    <form action="laporan_update.php" method="POST" class="d-inline-flex">
                        <input type="hidden" name="action" value="update_status">
                        <input type="hidden" name="id" value="<?= $data['id']; ?>">
                        <select name="status" class="form-select me-2 form-select-sm" style="width: auto;">
                            <option value="Pending">Pending</option>
                            <option value="Proses">Proses</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary">Update Status</button>
                    </form>
                </div>
                <?php endif; ?>
            </div>

            <div class="bg-light p-3 rounded mb-3">
                <strong>Isi Laporan:</strong><br>
                <?= nl2br($data['isi_laporan']); ?>
            </div>

            <div class="row mb-3">
                <div class="col-md-6"><strong>Lokasi:</strong> <?= $data['lokasi_kejadian']; ?></div>
                <div class="col-md-6"><strong>Instansi:</strong> <?= $data['instansi_tujuan']; ?></div>
            </div>

            <hr>
            <strong>Bukti Lampiran:</strong><br>
            <?php if($data['foto']): ?>
                <img src="assets/<?= $data['foto']; ?>" class="img-fluid rounded mt-2 shadow-sm" style="max-height: 400px;">
            <?php else: ?>
                <span class="text-muted">Tidak ada foto.</span>
            <?php endif; ?>

            <div class="mt-5 text-end">
                <?php if($_SESSION['id'] == $data['user_id'] || $_SESSION['level'] == 'admin'): ?>
                    <a href="laporan_edit.php?id=<?= $data['id']; ?>" class="btn btn-warning text-white">Edit</a>
                    <a href="laporan_delete.php?id=<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('Hapus permanen?')">Hapus</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>