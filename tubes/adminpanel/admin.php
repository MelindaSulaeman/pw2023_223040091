<?php

$koneksi = mysqli_connect("sql312.infinityfree.com", "if0_34373625", "LMNCc7rACMeDC", "if0_34373625_tubespw");

session_start();

$queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler");
$jumlahEkstrakulikuler = mysqli_num_rows($queryEkstrakulikuler);

$queryGallery = mysqli_query($koneksi, "SELECT * FROM gallery");
$jumlahGallery = mysqli_num_rows($queryGallery);

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bina Nusantara | Admin</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
    <!--Google Fonts-->
    <script src="https://unpkg.com/feather-icons"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- End Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!--Custom Css-->
    <link rel="stylesheet" href="style.css">
    <!--End Custom Css-->
</head>

<style>
    .kotak {
        border: solid;
    }

    .summary-kategori {
        background-color: #778899;
        border-radius: 15px;
    }

    .summary-produk {
        background-color: #008B8B;
        border-radius: 15px;
    }

    .navbar-bg {
        background-color: #e7e7e7;
    }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <h2 class="fw-bold  mb-2 mb-lg-0 mb-sm-0" style="color: rgb(205, 80, 71);">Bina Nusantara</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-list"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hero.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="ekskul.php">Ekstrakulikuler</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="gallery.php">Gallery</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-2 mb-lg-0 action-menu">
                    <li class="nav-item">
                        <a class="nav-link " href="../logout.php">
                            Logout
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar -->

    <!-- container -->
    <div class="container mt-5">

        <!-- Breadcrumb -->
        <div class="col-md-9 content">
            <h4>Selamat Datang di Dashboard Admin, <?= $_SESSION['user']['username'] ?></h4>
        </div>

        <!-- Breadcrumb -->

        <!-- Card -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mb-3">
                    <div class="summary-kategori p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-graduation-cap fa-7x text-black-60"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Ekskul</h3>
                                <p class="fs-4"><?php echo $jumlahEkstrakulikuler; ?> Ekskul</p>
                                <p><a href="ekskul.php" class="text-decoration-none text-white">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="summary-produk p-3">
                        <div class="row">
                            <div class="col-6">

                                <i class="fa-solid fa-camera fa-7x text-black-60"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Gallery</h3>
                                <p class="fs-4"><?php echo $jumlahGallery; ?> Gallery</p>
                                <p><a href="gallery.php" class="text-decoration-none text-white">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Card -->
    </div>
    <!-- container -->

    <!-- Footer -->
    <?php require('../partials/footer.php') ?>
    <!-- Akhir Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

</body>

</html>