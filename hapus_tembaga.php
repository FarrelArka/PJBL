<?php
include("koneksi.php");
$judul=$_GET['judul'];
$query="DELETE FROM tb_tembaga where judul ='$judul' ";
$hasil=mysqli_query($conn,$query);
if($hasil){
?>
<script language="javascript">document.location.href="Zaman Tembaga.php";</script>
<?php
}else{
    echo "Gagal hapus data";
}
?>