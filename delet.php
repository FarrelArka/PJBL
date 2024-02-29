<?php
include("koneksi.php");
$judul=$_GET['judul'];
$query="DELETE FROM tb_teks where judul ='$judul' ";
$hasil=mysqli_query($conn,$query);
if($hasil){
?>
<script language="javascript">document.location.href="mesolitikum.php";</script>
<?php
}else{
    echo "Gagal hapus data";
}
?>