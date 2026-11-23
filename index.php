<?php
require_once 'auth.php';
require_login(); // belum login -> login.php

// Arahkan ke halaman beranda sesuai role
switch ($_SESSION['role'] ?? '') {
    case 'admin': header('Location: daftar_user.php');  exit;
    case 'guru':  header('Location: daftar_guru.php');  exit;
    case 'siswa': header('Location: daftar_siswa.php'); exit;
    default:
        session_destroy();
        header('Location: login.php');
        exit;
}
