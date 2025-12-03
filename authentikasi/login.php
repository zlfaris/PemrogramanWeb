<!DOCTYPE html>
<html>
<head>
    <title>Login - SuaraQita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body class="bg-auth">
    <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 15px;">
        <h3 class="text-center fw-bold mb-4" style="color:var(--primary-red);">LOGIN</h3>
        
        <?php
        session_start();
        include '../config/config.php';
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            // Cek user di database
            $cek = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
            
            if(mysqli_num_rows($cek) > 0){
                $data = mysqli_fetch_assoc($cek);
                $_SESSION['id'] = $data['id'];
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['level'] = $data['level'];
                $_SESSION['status'] = "login";
                header("location:../home.php");
            } else {
                echo "<div class='alert alert-danger text-center'>Username / Password Salah!</div>";
            }
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-custom w-100 py-2">MASUK</button>
            <div class="text-center mt-3">
                <small>Belum punya akun? <a href="register.php" class="text-danger fw-bold">Daftar Disini</a></small>
            </div>
        </form>
    </div>
</body>
</html>