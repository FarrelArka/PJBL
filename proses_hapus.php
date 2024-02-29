<?php
include("koneksi.php");
$judul=$_GET['judul'];
$query="DELETE FROM tb_text where judul ='$judul' ";
$hasil=mysqli_query($conn,$query);
if($hasil){
?>
<script language="javascript">document.location.href="paleolitikum.php";</script>
<?php
}else{
    echo "Gagal hapus data";
}
?>