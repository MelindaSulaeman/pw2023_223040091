<?php
$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

session_start();

// Query semua data ekstrakulikuler
$queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler");

// Cek apakah ada keyword pencarian
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Query data ekstrakulikuler berdasarkan keyword
    $queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler WHERE judul LIKE '%$keyword%'");
}
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                        <a class="nav-link " href="../../logout.php">
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
    <div class="container mt-4">
        <h2>Daftar Ekstrakulikuler</h2>
        <form id="searchForm" method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Ekstrakulikuler" name="keyword" id="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
        <table class="table" id="ekstrakulikulerTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jumlah = 1;
                while ($data = mysqli_fetch_array($queryEkstrakulikuler)) { ?>
                    <tr>
                        <th scope="row"><?= $jumlah++; ?></th>
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['deskripsi']; ?></td>
                        <td>
                            <img src="../image/<?php echo $data['gambar']; ?>" style="width: 100px;">
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- footer -->
    <?php require('../../partials/footer.php') ?>
    <!-- footer -->

    <!-- Script Fontawesome -->
    <script src=" https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>

    <!-- Script Live Serching -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var keywordInput = document.getElementById("keyword");

            keywordInput.addEventListener("keyup", function() {
                var keyword = this.value;

                var xhr = new XMLHttpRequest();
                xhr.open("GET", "search.php?keyword=" + keyword, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        var resultTable = document.getElementById("ekstrakulikulerTable");
                        resultTable.innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            });
        });
    </script>
    <!-- Script Live Serching -->


</body>

</html>