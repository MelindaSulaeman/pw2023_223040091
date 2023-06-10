<?php

require "../vendor/autoload.php"; // Include the mPDF library

// Include file koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

// Fungsi untuk mengambil data galeri dari database
function getGalleryData()
{
    global $koneksi;
    $query = "SELECT * FROM gallery";
    $result = mysqli_query($koneksi, $query);
    $galleryData = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $galleryData;
}

// Fungsi untuk menambah data galeri ke database
function addGalleryData($data)
{
    global $koneksi;
    $gambar = $data['gambar']['name'];
    $gambar_tmp = $data['gambar']['tmp_name'];
    $folder = "image/";

    // Pindahkan file gambar ke folder yang ditentukan
    move_uploaded_file($gambar_tmp, $folder . $gambar);

    // Query untuk menambahkan data ke tabel gallery
    $query = "INSERT INTO gallery (gambar) VALUES ('$gambar')";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk menghapus data galeri dari database
function deleteGalleryData($id)
{
    global $koneksi;
    // Query untuk menghapus data dari tabel gallery berdasarkan id
    $query = "DELETE FROM gallery WHERE id='$id'";
    mysqli_query($koneksi, $query);
}

// Fungsi untuk mengupdate data galeri di database
function updateGalleryData($id, $data)
{
    global $koneksi;
    $gambar = $data['gambar']['name'];
    $gambar_tmp = $data['gambar']['tmp_name'];
    $folder = "image/";

    // Pindahkan file gambar ke folder yang ditentukan
    move_uploaded_file($gambar_tmp, $folder . $gambar);

    // Query untuk mengupdate data di tabel gallery berdasarkan id
    $query = "UPDATE gallery SET gambar='$gambar' WHERE id='$id'";
    mysqli_query($koneksi, $query);
}

// Proses tambah data
if (isset($_POST['add'])) {
    addGalleryData($_FILES);
    header('Location: gallery.php');
    exit();
}

// Proses hapus data
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    deleteGalleryData($id);
    header('Location: gallery.php');
    exit();
}

// Proses update data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    updateGalleryData($id, $_FILES);
    header('Location: gallery.php');
    exit();
}

// Ambil data galeri dari database
$galleryData = getGalleryData();

// Generate PDF report
if (isset($_GET['generate_pdf'])) {
    $mpdf = new \Mpdf\Mpdf(); // Create an instance of mPDF

    ob_start(); // Start output buffering
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

    <body>
        <div class="mt-4">
            <h2>Daftar Gallery</h2>
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
                    foreach ($galleryData as $data) : ?>
                        <tr>
                            <td><?= $jumlah++; ?></td>
                            <td><img src="image/<?= $data['gambar']; ?>" alt="Gambar" width="100"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </body>
<?php
    $html = ob_get_contents();
    ob_end_clean();

    // Set PDF configuration
    $mpdf->SetHeader('Bina Nusantara'); // Set header
    $mpdf->WriteHTML($html);
    $mpdf->Output(); // Output the PDF as a download

    exit();
}

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
                        <a class="nav-link" href="../logout.php">
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

        <!-- Button Tambah Gambar -->
        <div class="my-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">
                Tambah
            </button>
        </div>
        <!-- Button Tambah Gambar -->

        <!-- Tambah Galeri -->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahModalLabel">Tambah Gambar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Tambah Galeri -->

        <!-- Tabel Data -->
        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jumlah = 1;
                    foreach ($galleryData as $data) : ?>
                        <tr>
                            <td><?= $jumlah++; ?></td>
                            <td><img src="image/<?= $data['gambar']; ?>" alt="Gambar" width="100"></td>
                            <td>

                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id']; ?>">Edit</button>
                                <a href="?delete=<?= $data['id']; ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Generate button -->
            <div class="mt-3">
                <a href="?generate_pdf" class="btn btn-primary">Download PDF</a>
            </div>
            <!-- Generate button -->
        </div>
        <!-- Tabel Data -->
    </div>


    <!-- Edit Data -->
    <?php foreach ($galleryData as $data) : ?>
        <div class="modal fade" id="editModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="mb-3">
                                <label for="edit-gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="edit-gambar" name="gambar">
                            </div>
                            <div class="mb-3">
                                <label>Preview Gambar</label>
                                <img src="image/<?= $data['gambar']; ?>" alt="Preview Gambar" class="img-fluid">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Edit Data -->

    <!-- Footer -->
    <?php require('../partials/footer.php') ?>
    <!-- Footer -->

    <!-- Script Fontawesome -->
    <script src="https://kit.fontawesome.com/84b8f8fd02.js" crossorigin="anonymous"></script>


</body>

</html>