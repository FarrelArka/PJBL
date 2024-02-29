<?php
//form edit atau update
include "koneksi.php";
$judul=$_GET['judul'];
$query="SELECT * FROM tb_teks WHERE judul='$judul'";
$hasil=mysqli_query($conn,$query);
$data=mysqli_fetch_array($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>


<form method="post" action="proses_update.php">
    <table border=1 class="table table-striped table-hover">
        <tr>
            <td>Judul</td>
            <td>:</td>
           <td><input type="text" name="judul" value="<?php echo $data['judul'];?>" readonly="readonly"></td>
        </tr>
        <tr>
            <td>Artikel</td>
            <td>:</td>
            <td><input type="text" name="artikel" value="<?php echo $data['artikel'];?>"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="KIRIM"></td>
            <td></td>
            <td><input type="reset" name="reset" value="RESET"></td>
        </tr>
    </table>
</form>