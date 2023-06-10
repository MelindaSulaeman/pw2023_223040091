<?php
$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

$queryEkstrakulikuler = mysqli_query($koneksi, "SELECT id, judul, deskripsi, gambar FROM ekstrakulikuler LIMIT 6");

$queryGallery = mysqli_query($koneksi, "SELECT id,  gambar FROM gallery LIMIT 6");

$queryGallery = mysqli_query($koneksi, "SELECT id, gambar FROM gallery");
?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>School. | <?= $title; ?></title>

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

<body>
    <header>
        <section id="topbar" class="mb-2 mb-lg-0 mb-sm-0 d-none d-lg-flex align-items-center pt-2 pb-2 bg-primary text-white topbar-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6   text-start">
                        <span class="px-3"><i class="bi bi-phone "></i> +1 5589 55488 55 </span>
                        <i class="bi bi-clock"></i> Mon-Sat: 11:00 AM - 23:00 PM
                    </div>
                </div>
            </div>
        </section>