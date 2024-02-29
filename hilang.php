<?php
include("koneksi.php");
$judul=$_GET['judul'];
$query="DELETE FROM tbl_pjbl where judul ='$judul' ";
$hasil=mysqli_query($conn,$query);
if($hasil){
?>
<script language="javascript">document.location.href="megalitikum.php";</script>
<?php
}else{
    echo "Gagal hapus data";
}
?>