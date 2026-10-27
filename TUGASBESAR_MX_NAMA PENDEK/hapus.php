<?php

session_start();

if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}


// Ambil ID
$id = isset($_GET['id']) ? (int) $_GET['id'] : -1;


// Cek apakah data ada
if (!isset($_SESSION['tugas'][$id])) {

    $_SESSION['error'] = 'Data tugas tidak ditemukan.';

    header('Location: index.php');
    exit;
}


// Hapus data
unset($_SESSION['tugas'][$id]);


// Rapikan kembali index array
$_SESSION['tugas'] = array_values($_SESSION['tugas']);


$_SESSION['success'] = 'Tugas berhasil dihapus.';


header('Location: index.php');
exit;