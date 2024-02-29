<?php
include("koneksi.php");
@$judul=$_POST['judul'];
@$artikel=$_POST['artikel'];

$query = "UPDATE tbl_pjbl SET artikel='$artikel',judul='$judul';";
$hasil = mysqli_query($conn, $query);
if($hasil){
    header('location:megalitikum.php');
}else{
    echo "Gagal Update Data";
    
}
?>