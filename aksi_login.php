<?php
require_once 'koneksi.php';
require_once 'auth.php'; // sudah session_start()

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: login.php'); exit; }

$username = trim($_POST['username'] ?? '');
$pass     = $_POST['password'] ?? '';

// Prepared statement: username tidak lagi disisipkan langsung ke SQL (aman dari SQL injection)
$user = one(q($koneksi,
    "SELECT users.*, COALESCE(siswa.nama, guru.nama) AS nama, siswa.kelas
     FROM users
     LEFT JOIN siswa ON users.id = siswa.user_id
     LEFT JOIN guru  ON users.id = guru.user_id
     WHERE users.username = ?", 's', [$username]));

// password_verify hanya cocok jika kolom password berisi hash bcrypt yang valid
if ($user && password_verify($pass, $user['password'])) {
    session_regenerate_id(true);
    $_SESSION['id']       = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama']     = $user['nama'] ?: $user['username']; // admin tidak punya baris di siswa/guru
    $_SESSION['role']     = $user['role'];
    $_SESSION['kelas']    = $user['kelas'];
    $_SESSION['login']    = true;

    header('Location: index.php'); // index.php mengarahkan sesuai role
    exit;
}

header('Location: login.php?pesan=gagal');
exit;
