<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="assets/logo_historia-removebg-preview.png" />
    <!-- Custom Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100 bg-light">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
            <div class="container px-5">
                <a class="navbar-brand" href="User.php"><span class="fw-bolder text-primary">Historia Nirleka</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                        <li class="nav-item"><a class="nav-link" href="User.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="resume.html">Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="projects.php">Opinion</a></li>
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Akun</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="index.html">Logout</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <section class="py-5">
            <div class="container px-5 mb-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="badge bg-gradient-primary-to-secondary text-white mb-4">Opinion</span></h1>
                    <!-- Projects Section -->
                    <section class="py-5">
                        <div class="container px-5 mb-5">
                            <div class="text-center mb-5">
                                <!-- Heading -->
                                <?php
                                session_start(); // Mulai sesi

                                include "koneksi.php"; // Masukkan file koneksi database

                                // Periksa apakah pengguna sudah masuk atau belum
                                if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
                                    // Variabel 'username' memiliki nilai yang valid, Anda dapat menggunakannya
                                    $username = $_SESSION['username'];

                                    // Fetch comments with usernames
                                    $query = "SELECT tb_opinion.opini, tb_user.username, tb_opinion.tanggal FROM tb_opinion JOIN tb_user ON tb_opinion.id_user = tb_user.id_user ORDER BY tb_opinion.tanggal DESC";
                                    $result = mysqli_query($conn, $query);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<strong>" . $row['username'] . ":</strong> " . $row['opini'] . " (Posted on: " . $row['tanggal'] . ")<br>";
                                        }
                                    } else {
                                        echo "No comments yet.";
                                    }
                                } else {
                                    // Session 'username' tidak diatur atau kosong
                                    // Lakukan tindakan yang sesuai, misalnya, kembalikan pengguna ke halaman login
                                    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
                                    // Anda bisa melakukan redirect ke halaman login:
                                    // header("Location: login.php");
                                    // exit();
                                }
                                ?>
                            </div>
                            <div class="card overflow-hidden shadow rounded-4 border-0">
                                <div class="card-body p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="p-5">
                                            <!-- Form for sending comments -->
                                            <form method="post" action="">
                                                <div class="comment-box">
                                                    <textarea name="opini" id="" cols="30" rows="10" placeholder="Tulislah pendapatmu"></textarea>
                                                    <input type="submit" name="submit" value="kirim">
                                                </div>
                                            </form>

                                            <?php
// Periksa apakah sesi sudah dimulai
if (session_status() === PHP_SESSION_NONE) {
    // Jika tidak, mulai sesi
    session_start();
}

// Masukkan file koneksi database
include "koneksi.php";

// Periksa apakah session 'username' telah diatur dan memiliki nilai yang valid
if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // Variabel 'username' memiliki nilai yang valid, Anda dapat menggunakannya
    $username = $_SESSION['username'];
    
    // Ambil id_user berdasarkan username dari tabel tb_user
    $user_query = "SELECT id_user FROM tb_user WHERE username = ?";
    $user_stmt = mysqli_prepare($conn, $user_query);
    mysqli_stmt_bind_param($user_stmt, "s", $username);
    mysqli_stmt_execute($user_stmt);
    $user_result = mysqli_stmt_get_result($user_stmt);
    
    if($user_result && mysqli_num_rows($user_result) > 0) {
        // Ambil id_user dari hasil query
        $user_row = mysqli_fetch_assoc($user_result);
        $id_user = $user_row['id_user'];
        
        // Periksa apakah tombol submit telah diklik
        if(isset($_POST['submit'])) {
            // Validasi opini yang dikirimkan
            $opinion = trim($_POST['opini']); // Hapus spasi di awal dan akhir
            if(empty($opinion)) {
                echo "Opini tidak boleh kosong.";
            } else {
                // Lakukan operasi INSERT ke dalam tabel tb_opinion
                // Pastikan nilai id_user yang dimasukkan sudah valid dan ada di tabel tb_user
                $insert_query = "INSERT INTO tb_opinion (id_user, opini) VALUES (?, ?)";
                $insert_stmt = mysqli_prepare($conn, $insert_query);
                mysqli_stmt_bind_param($insert_stmt, "is", $id_user, $opinion);
                if(mysqli_stmt_execute($insert_stmt)) {
                    echo "Opini berhasil dikirim.";
                    header("Location: ".$_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Gagal menambahkan opini: " . mysqli_error($conn);
                }
            }
        }
    } else {
        echo "Gagal mendapatkan id_user dari username: " . mysqli_error($conn);
    }
} else {
    // Session 'username' tidak diatur atau kosong
    // Lakukan tindakan yang sesuai, misalnya, kembalikan pengguna ke halaman login
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    // Anda bisa melakukan redirect ke halaman login:
    // header("Location: login.php");
    // exit();
}
?>

                                              
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
