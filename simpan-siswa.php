<?php

//include koneksi database
include('koneksi.php');



// //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
// if ($connection->query($query)) {
//     // Now let's move the uploaded image into the folder: image
// 	if (move_uploaded_file($tempname, $folder)) {
// 		echo "<h3> Image uploaded successfully!</h3>";
// 	} 

//     //redirect ke halaman index.php 
//     header("location: index.php");
// } else {

//     //pesan error gagal insert data
//     echo "Data Gagal Disimpan!";
// }


if (isset($_POST['upload'])) {

    //get data dari form
    $nisn           = $_POST['nisn'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat       = $_POST['alamat'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $filename;

    $db = mysqli_connect("localhost", "root", "", "db_sekolah");

    // Get all the submitted data from the form
    $sql = "INSERT INTO tbl_siswa (nisn, nama_lengkap, alamat, namafile) VALUES ('$nisn', '$nama_lengkap', '$alamat','$filename')";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3> Image uploaded successfully!</h3>";
        header("location: index.php");
    } else {
        echo "<h3> Failed to upload image!</h3>";
    }
}
