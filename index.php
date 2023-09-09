<?php
require 'functions.php';

$mahasiswa = query(" SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>List Mahasiswa</h1>
    <a href="Tambah.php">Tambah</a>
    <br><br>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>gambar</th>
            <th>nama</th>
            <th>nim</th>
            <th>email</th>
            <th>jurusan</th>
            <th>aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td>
                <?= $i; ?>
            </td>
            <td><img src="img/<?= $mhs["gambar"] ?>" alt="" width="50"></td>
            <td>
                <?= $mhs["nama"] ?>
            </td>
            <td>
                <?= $mhs["nim"] ?>
            </td>
            <td>
                <?= $mhs["email"] ?>
            </td>
            <td>
                <?= $mhs["jurusan"] ?>
            </td>
            <td> <a href="ubah.php?id=<?= $mhs["id"] ?>">edit</a> |
                <a href="hapus.php?id=<?= $mhs["id"] ?>" onclick="
                return confirm('yakin?');">delete</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>



</body>

</html>