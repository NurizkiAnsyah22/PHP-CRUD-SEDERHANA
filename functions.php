<?php
$db = mysqli_connect("localhost", "root", "", "php_dasar");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;

}

function tambah($data)
{
    global $db;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO mahasiswa
VALUES
('','$nim','$nama','$email','$jurusan','$gambar')";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);

}

function hapus($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM mahasiswa WHERE id = '$id'");
    return mysqli_affected_rows($db);
}




function ubah($data) {
    global $db;
    $id = ($data["id"]);
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "UPDATE mahasiswa SET
                nim = '$nim',
                nama = '$nama',
                email = '$email',
                jurusan = '$jurusan',
                gambar = '$gambar'
                WHERE id = $id
                ";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);

}

function cari($keyword) {
   $query = "SELECT * FROM mahasiswa WHERE 
   nama LIKE '%$keyword%' OR
   nim LIKE '%$keyword%' OR
   email LIKE '%$keyword%' OR
   jurusan LIKE '%$keyword%'
   ";

   return query($query);
}











?>