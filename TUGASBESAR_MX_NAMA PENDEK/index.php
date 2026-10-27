<?php

session_start();

if (!isset($_SESSION['tugas'])) {
    $_SESSION['tugas'] = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Tugas</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Daftar Tugas</h1>
            <p>CRUD menggunakan PHP Session</p>
        </div>

        <a href="tambah.php" class="btn">
            + Tambah Tugas
        </a>
    </div>


    <?php if (isset($_SESSION['success'])): ?>

        <div class="alert success">
            <?= $_SESSION['success']; ?>
        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert error">
            <?= $_SESSION['error']; ?>
        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>


    <?php if (empty($_SESSION['tugas'])): ?>

        <div class="empty">
            <h3>Belum ada tugas</h3>
            <p>Silakan tambahkan tugas terlebih dahulu.</p>
        </div>

    <?php else: ?>

        <div class="list">

            <?php foreach ($_SESSION['tugas'] as $index => $tugas): ?>

                <div class="card">

                    <div class="card-content">

                        <h2>
                            <?= htmlspecialchars($tugas['judul']); ?>
                        </h2>

                        <p>
                            <?= htmlspecialchars($tugas['deskripsi']); ?>
                        </p>

                    </div>


                    <div class="actions">

                        <a
                            href="edit.php?id=<?= $index; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="hapus.php?id=<?= $index; ?>"
                            class="btn-delete"
                            onclick="return confirm('Yakin ingin menghapus tugas ini?')"
                        >
                            Hapus
                        </a>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php endif; ?>

</div>

</body>
</html>