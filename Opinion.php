<?php
include "koneksi.php";
                @$id=$_POST[''];
                    @$Opini=$_POST['opini'];
                        @$kirim=$_POST['submit'];
                            @$query="INSERT INTO tb_opinion VALUES ('$id', '$Opini') ";
                            if ($kirim) {
                                $hasil=mysqli_query($conn, $Query, $query);
                                echo "Data berhasil disimpan ";
                            header("location:mesolitikum.php");
                        }