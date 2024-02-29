<html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Insert Data Siswa</title>
        </head>
            <body>
                <form method="POST" action="">
                    <table border="1"class="table table-striped table-hover">
                        <tr>
                            <td>judul</td>
                                <td>:</td>
                                    <td><input type="text" name="judul"> </td>
                                        </tr>
                                    <tr>
                                <td>Artikel</td>
                            <td>:</td>
                        <td><textarea type="text" name="artikel"></textarea> </td>
                        </tr>
                    <tr>
                <td><input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset"></td>
        </tr>
    </table>
</form>
    <?php
        //memanggil file koneksi.php
            include "koneksi.php";
                @$judul=$_POST['judul'];
                    @$artikel=$_POST['artikel'];
                        @$kirim=$_POST['submit'];
                            @$query="INSERT INTO tb_perunggu VALUES ('$judul', '$artikel') ";
                                //hasil data array
                                if ($kirim) {
                                    $hasil=mysqli_query($conn, $query);
                                    echo "Data berhasil disimpan ";
                                header("location:Zaman perunggu.php");
                            }
                        ?>
                    </body>
                </html>
            <?php
        
    ?>