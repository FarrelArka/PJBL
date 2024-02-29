<?php
include("koneksi.php");
@$judul=$_POST['judul'];
@$artikel=$_POST['artikel'];

$query = "UPDATE tb_text SET artikel='$artikel'where judul='$judul';";
$hasil = mysqli_query($conn, $query);
if($hasil){
    header('location:paleolitikum.php');
}else{
    echo "Gagal Update Data";
    
}
?>