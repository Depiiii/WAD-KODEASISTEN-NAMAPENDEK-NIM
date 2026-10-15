<?php

session_start();

if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}


// Ambil ID dari URL
$id = isset($_GET['id']) ? (int) $_GET['id'] : -1;


// Cek apakah ID tersedia
if (!isset($_SESSION['tugas'][$id])) {

    $_SESSION['error'] = 'Data tugas tidak ditemukan.';

    header('Location: index.php');
    exit;
}


// Ambil data lama
$tugas = $_SESSION['tugas'][$id];


// Kalau form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $judul = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);


    // Validasi
    if ($judul === '' || $deskripsi === '') {

        $_SESSION['error'] = 'Judul dan deskripsi wajib diisi.';

    } else {

        // Update data
        $_SESSION['tugas'][$id] = [
            'judul' => $judul,
            'deskripsi' => $deskripsi
        ];

        $_SESSION['success'] = 'Tugas berhasil diperbarui.';

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

    <title>Edit Tugas</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container small">

    <h1>Edit Tugas</h1>

    <p class="subtitle">
        Perbarui informasi tugas
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
                value="<?= htmlspecialchars($tugas['judul']); ?>"
            >

        </div>


        <div class="form-group">

            <label for="deskripsi">
                Deskripsi
            </label>

            <textarea
                id="deskripsi"
                name="deskripsi"
            ><?= htmlspecialchars($tugas['deskripsi']); ?></textarea>

        </div>


        <div class="form-actions">

            <a href="index.php" class="btn-secondary">
                Batal
            </a>

            <button type="submit" class="btn">
                Simpan Perubahan
            </button>

        </div>

    </form>

</div>

</body>
</html>