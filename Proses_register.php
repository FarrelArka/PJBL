<script language ="javascript" type="text/javascript">
            alert("Registerasi Berhasil Silahkan Login ")
            </script>
<?php
//memanggil file koneksi.php
include "koneksi.php";
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$level="user";//level otomatis diisi user pd saat registrasi
//format acak password harus sama dengan proses_login.php

$kirim=$_POST['kirim'];
//proses kirim data ke database MYSQL
if($kirim){
$query="INSERT INTO tb_user VALUES
('','$username','$password','$email','$level')";
$hasil=mysqli_query($conn,$query);
    header('location:login.php');
}else{
echo "Registrasi User Gagal!";
}
?>