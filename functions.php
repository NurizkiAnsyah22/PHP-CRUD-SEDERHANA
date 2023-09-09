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
//upload gambar
    $gambar = upload() ;
        if(!$gambar) {
            return false;
        }
    

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


function upload() {
    
    $fileUpload = $_FILES["gambar"]["name"];
    $sizeFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpSmtra = $_FILES["gambar"]["tmp_name"];

    //cek apakah ada file gambar yang di upload

    if( $error === 4) {
        echo "<script> 
        alert('Silahkan upload gambar terlebih dahulu!')
        </script>";
        return false; 
    }

    //cek extension gambar
    $extGambarValid = ["jpg", "jpeg","png"];
    $extensiGambar = explode(".", $fileUpload);
    $extensiGambar = strtolower(end($extensiGambar));

    if(!in_array($extensiGambar, $extGambarValid)) {
        echo "<script> 
        alert('File yang anda masukan bukan gambar!')
        </script>";
        return false; 
    }

    //cek ukuran gambar di bawah 1 mb
    if($sizeFile > 1000000) {
        echo "<script> 
        alert('Silahkan upload gambar di bawah 1MB!')
        </script>";
        return false; 
    }

    //generate nama gambar baru
    
    $fileUploadBaru = uniqid();
  $fileUploadBaru .= ".";
  $fileUploadBaru .= $extensiGambar;
    
    move_uploaded_file($tmpSmtra,"img/" . $fileUploadBaru);
return $fileUploadBaru;    
}  

    



function ubah($data) {
    global $db;
    $id = ($data["id"]);
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

 // Cek apakah tidak ada berkas yang diunggah
 if ($_FILES['gambar']['error'] === 4 && $_FILES['gambar']['size'] > 1000000) {
    $gambar = $gambarLama;
} else {
    $gambar = upload();
}

   

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