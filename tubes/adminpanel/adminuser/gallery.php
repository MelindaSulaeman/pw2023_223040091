<?php

session_start();

$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

$queryGallery = mysqli_query($koneksi, "SELECT * FROM gallery");

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bina Nusantara | Users</title>

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
        background-color: #0a6b4a;
        border-radius: 15px;
    }

    .summary-produk {
        background-color: #0a516b;
        border-radius: 15px;
    }

    .navbar-bg {
        background-color: #e7e7e7;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-bg">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <h2 class="fw-bold mb-2 mb-lg-0 mb-sm-0" style="color: rgb(205, 80, 71);">Bina Nusantara</h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-list"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Home</a>
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
                        <a class="nav-link" href="../../logout.php">
                            Logout
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container">
        <h1 class="mt-4">Daftar Gallery</h1>

        <!-- Tabel Data -->
        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jumlah = 1;
                    while ($data = mysqli_fetch_array($queryGallery)) { ?>
                        <tr>
                            <td><?= $jumlah++; ?></td>
                            <td><img src="../image/<?= $data['gambar']; ?>" alt="Gambar" width="200px"></td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Tabel Data -->
    </div>

    <!-- Footer -->
    <?php require('../../partials/footer.php') ?>
    <!-- Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>