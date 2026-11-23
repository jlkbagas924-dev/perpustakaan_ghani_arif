<?php
session_start();
// Jika sudah login, serahkan ke index.php (yang mengarahkan sesuai role)
if (!empty($_SESSION['login'])) {
    header("location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - SIACAD SMK</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4">
                    <h4 class="card-title text-center mb-4">Login SIACAD</h4>
                    
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
                        <div class="alert alert-danger">Email atau Password salah!</div>
                    <?php endif; ?>
                    <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "registered"): ?>
                        <div class="alert alert-success">Registrasi berhasil! Silakan login.</div>
                    <?php endif; ?>

                    <form action="aksi_login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                    </form>
                    <div class="text-center">
                        <small>Belum punya akun? <a href="register.php">Register di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>