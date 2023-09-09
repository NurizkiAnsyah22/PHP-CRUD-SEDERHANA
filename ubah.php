<?php
require "functions.php";


//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$mhsUbah = query("SELECT * FROM mahasiswa WHERE id= $id")[0];


//cek apakah tombol sudah di submit
if (isset($_POST["submit"])) {

    if ( ubah($_POST) > 0) 
    {
        echo "
        <script> alert('Data berhasil di ubah!');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script> alert('Data gagal di ubah!');
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
    <title>Ubah Data</title>
</head>

<body>
    <h1>Ubah data</h1>

    <form action="" method="post">
        <ul>
            <input type="hidden" name="id" id="id" value="<?= $mhsUbah["id"]?>">

            <li> <label for=" nim">Nim : </label>
                <input type="text" name="nim" id="nim" required value="<?= $mhsUbah["nim"]?>">
            </li>
            <br>
            <li> <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhsUbah["nama"]?>">
            </li>
            <br>
            <li> <label for="email">Email : </label>
                <input type="email" name="email" id="email" required value="<?= $mhsUbah["email"]?>">
            </li>
            <br>
            <li> <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhsUbah["jurusan"]?>">
            </li>
            <br>
            <li> <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhsUbah["gambar"]?>">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Ubah</button>
            </li>

        </ul>



    </form>

</body>

</html>