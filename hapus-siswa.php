<?php

include('koneksi.php');

//get id
$id = $_GET['id'];
// $queryNamaFile = mysqli_query($connection, "SELECT namafile frin tbl_siswa WHERE id_siswa = '$id'");
$queryFileName = mysqli_query($connection, "SELECT * FROM tbl_siswa WHERE id_siswa = '$id'");
while ($row = mysqli_fetch_array($queryFileName)) {
    unlink('./image/' . $row['namafile']); //delete it

}

$query = "DELETE FROM tbl_siswa WHERE id_siswa = '$id'";

if($connection->query($query)) {
    header("location: index.php");
} else {
    echo "DATA GAGAL DIHAPUS!";
}
