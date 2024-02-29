<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Historia Nirleka</title>

    <link rel="icon" type="image/x-icon" href="assets/logo_historia-removebg-preview.png" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container px-5">
            <a class="navbar-brand" href="User.php"><span class="fw-bolder text-primary">Historia Nirleka</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                    <li class="nav-item"><a class="nav-link" href="User.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="resume.html">Back</a></li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- Projects Section-->
    <section class="py-5">
        
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="display-5 fw-bolder mb-0"><span class="badge bg-gradient-primary-to-secondary text-white mb-4">Paleolitikum</span></h1>
            </div>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Project Card 1-->
                        <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-5">
                                        <div align="center">
                                            <img class="profile-img" src="assets/logo fathir purba.jpeg" alt="..." />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        
        <br>
        <div class="ms-5">
        <div class="ms-5 mb-3"><a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder ms-5" href="insert.php">Buat Artikel</a></div></div>
        
        <?php
                            include "koneksi.php"; //panggil file koneksi
        $query="SELECT * FROM tb_text"; //buat query sql
                           $hasil = mysqli_query($conn, $query);
        //perulangan untuk nampilkan data dari database
        while ($data=mysqli_fetch_array($hasil)){
        ?>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                
                <!-- Project Card 1-->
                <div class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                    <div class="card-body p-0">
                        <div class="d-flex align-items-center">

                            
                            <div class="p-5">
                                <p class="fw-bolder">
                                    <?php echo $data['judul']?>
                                </p>
                                <p>
                                    <?php echo $data['artikel']?>
                                </p>

                            </div>

                     
                            <br>
                            <a class="ms-5 mt-5" href="form_update.php?judul=<?php echo $data['judul'];?>">Edit</a>
                            <a class="ms-5 mt-5" href="proses_hapus.php?judul=<?php echo $data['judul'];?>"
                                onclick="return confirm('apakah anda yakin?')">Delete</a>
                            <br>


                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php
        }
    ?>
        
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Experience Section-->
                <section>
                    <div class="d-flex align-items-center justify-content-between mb-4">

                        </a>
                    </div>

                    <!-- Experience Card 1-->
                    

                </section>
</body>
</html>