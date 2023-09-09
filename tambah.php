<?php
require "functions.php";
//cek apakah tombol sudah di submit
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script> alert('Data berhasil di tambahkan!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Data gagal di tambahkan!');
        document.location.href='index.php';
        </script>
        ";
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>

            <li> <label for="nim">Nim : </label>
                <input type="number" name="nim" id="nim" required>
            </li>
            <br>
            <li> <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <br>
            <li> <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>
            <br>
            <li> <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <br>
            <li> <label for="gambar">Gambar : </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambahkan</button>
            </li>

        </ul>



    </form>

</body>

</html>