<?php
include("koneksi.php");
@$judul=$_POST['judul'];
@$artikel=$_POST['artikel'];

$query = "UPDATE tb_tembaga SET artikel='$artikel',judul='$judul';";
$hasil = mysqli_query($conn, $query);
if($hasil){
    header('location:Zaman Tembaga.php');
}else{
    echo "Gagal Update Data";
    
}
?>