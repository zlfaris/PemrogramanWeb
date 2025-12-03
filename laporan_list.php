<?php include 'authentikasi/cek_login.php'; include 'config/config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Laporan - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
  <div class="container">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="home.php">HOME</a></li>
        <li class="nav-item"><a class="nav-link" href="lapor.php">LAPOR</a></li>
        <li class="nav-item"><a class="nav-link active" href="laporan_list.php">LIHAT PENGADUAN</a></li>
      </ul>
      <a href="authentikasi/logout.php" class="btn btn-sm btn-light text-danger fw-bold">KELUAR</a>
  </div>
</nav>

<div class="hero-header"><div class="container"><h3>Daftar Pengaduan</h3></div></div>

<div class="container pb-5" style="margin-top: 20px;">
    <div class="card card-overlap">
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="5%">No</th>
                        <th>Judul Laporan</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_user = $_SESSION['id'];
                    // Admin lihat semua, User lihat punya sendiri
                    if($_SESSION['level'] == 'admin'){
                        $query = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC");
                    } else {
                        $query = mysqli_query($conn, "SELECT * FROM laporan WHERE user_id='$id_user' ORDER BY id DESC");
                    }
                    
                    $no = 1;
                    while($row = mysqli_fetch_assoc($query)){
                        // Warna Badge Status
                        $badge = "bg-secondary";
                        if($row['status'] == 'Proses') $badge = "bg-primary";
                        if($row['status'] == 'Selesai') $badge = "bg-success";
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>
                            <strong><?= $row['judul_laporan']; ?></strong><br>
                            <small class="text-muted"><?= substr($row['isi_laporan'], 0, 50); ?>...</small>
                        </td>
                        <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
                        <td><span class="badge <?= $badge; ?>"><?= $row['status']; ?></span></td>
                        <td>
                            <a href="laporan_detail.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-custom">Lihat Detail</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>