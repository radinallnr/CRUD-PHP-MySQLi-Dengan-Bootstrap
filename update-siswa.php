<?php

//include koneksi database
include('koneksi.php');

//get data dari form
$id_siswa     = $_POST['id_siswa'];
$nisn         = $_POST['nisn'];
$nama_lengkap = $_POST['nama_lengkap'];
$alamat       = $_POST['alamat'];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "./image/" . $filename;   
$db = mysqli_connect("localhost", "root", "", "db_sekolah");
$queryFileName = mysqli_query($connection, "SELECT * FROM tbl_siswa WHERE id_siswa = '$id_siswa'");



//query update data ke dalam database berdasarkan ID
$query = "UPDATE tbl_siswa 
SET nisn = '$nisn', 
nama_lengkap = '$nama_lengkap', 
alamat = '$alamat', 
namafile = '$filename' 
WHERE id_siswa = '$id_siswa'";
// echo $query;
 // Now let's move the uploaded image into the folder: image
 if (move_uploaded_file($tempname, $folder)) {
    while ($row = mysqli_fetch_array($queryFileName)) {
        unlink('./image/' . $row['namafile']); //delete it
    
    }
    mysqli_query($db, $query);
    echo "<h3> Image uploaded successfully!</h3>";
    header("location: index.php");
} else {
    echo "<h3> Failed to upload image!</h3>";
}
