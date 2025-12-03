<!DOCTYPE html>
<html>
<head>
    <title>Daftar - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-auth">
    <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center fw-bold mb-4" style="color:var(--primary-red);">DAFTAR</h3>
        
        <?php
        include '../config/config.php';
        if(isset($_POST['daftar'])){
            $nama = $_POST['nama'];
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $telp = $_POST['telp'];

            // Cek username kembar
            $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$user'");
            if(mysqli_num_rows($cek) > 0){
                 echo "<div class='alert alert-danger'>Username sudah digunakan!</div>";
            } else {
                mysqli_query($conn, "INSERT INTO users (nama, username, password, telp, level) VALUES ('$nama', '$user', '$pass', '$telp', 'user')");
                echo "<script>alert('Pendaftaran Berhasil! Silakan Login.'); window.location='login.php';</script>";
            }
        }
        ?>

        <form method="POST">
            <div class="mb-2">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">No. Telp</label>
                <input type="number" name="telp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="daftar" class="btn btn-custom w-100 py-2">DAFTAR</button>
            <div class="text-center mt-3">
                <small>Sudah punya akun? <a href="login.php" class="text-danger fw-bold">Login Disini</a></small>
            </div>
        </form>
    </div>
</body>
</html>