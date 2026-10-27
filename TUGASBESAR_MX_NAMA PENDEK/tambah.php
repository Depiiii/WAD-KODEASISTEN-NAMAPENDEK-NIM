<?php

session_start();

if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}


// Kalau form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);


    // Validasi
    if ($judul === '' || $deskripsi === '') {

        $_SESSION['error'] = 'Judul dan deskripsi wajib diisi.';

    } else {

        // Tambahkan data ke session
        $_SESSION['tugas'][] = [
            'judul' => $judul,
            'deskripsi' => $deskripsi
        ];

        $_SESSION['success'] = 'Tugas berhasil ditambahkan.';

        // Kembali ke halaman utama
        header('Location: index.php');
        exit;
    }
}

?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tugas</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container small">

    <h1>Tambah Tugas</h1>

    <p class="subtitle">
        Tambahkan tugas baru
    </p>


    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert error">

            <?= $_SESSION['error']; ?>

        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>


    <form method="POST">

        <div class="form-group">

            <label for="judul">
                Judul Tugas
            </label>

            <input
                type="text"
                id="judul"
                name="judul"
                placeholder="Contoh: Tugas WAD"
                value="<?= isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : ''; ?>"
            >

        </div>


        <div class="form-group">

            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                placeholder="Masukkan deskripsi tugas..."
            ><?= isset($_POST['deskripsi']) ? htmlspecialchars($_POST['deskripsi']) : ''; ?></textarea>

        </div>


        <div class="form-actions">

            <a href="index.php" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn">
                Simpan
            </button>

        </div>

    </form>

</div>

</body>
</html>