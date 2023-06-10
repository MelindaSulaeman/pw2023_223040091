<?php

require "../vendor/autoload.php"; // Include the mPDF library

$koneksi = mysqli_connect("localhost", "root", "", "tubespw");

// Fungsi untuk mendapatkan daftar semua data ekstrakulikuler
function getGalleryData()
{
    global $koneksi;
    // Query untuk mendapatkan data ekstrakulikuler
    $query = "SELECT * FROM ekstrakulikuler";

    // Eksekusi query dan simpan hasilnya dalam variabel $result
    $result = mysqli_query($koneksi, $query);

    // Inisialisasi array kosong untuk menyimpan data galeri
    $galleryData = array();

    // Loop melalui hasil query dan tambahkan setiap baris data ke array
    while ($row = mysqli_fetch_assoc($result)) {
        $galleryData[] = $row;
    }

    return $galleryData;
}

// Fungsi untuk menambahkan data ekstrakulikuler
function addGalleryData($data)
{
    global $koneksi;
    // Ekstraksi data dari input form
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $folder = "image/";

    // Pindahkan file gambar ke folder yang ditentukan
    move_uploaded_file($gambar_tmp, $folder . $gambar);

    // Query untuk menambahkan data ke tabel ekstrakulikuler
    $query = "INSERT INTO ekstrakulikuler (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')";

    // Eksekusi query
    mysqli_query($koneksi, $query);
}

function updateGalleryData($id, $data)
{
    global $koneksi;
    // Ekstraksi data dari input form
    $judul = $data['judul'];
    $deskripsi = $data['deskripsi'];

    // Periksa apakah ada file gambar yang diunggah
    if (isset($_FILES['gambar']['tmp_name']) && $_FILES['gambar']['tmp_name'] !== '') {
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $folder = "image/";

        // Pindahkan file gambar ke folder yang ditentukan
        move_uploaded_file($gambar_tmp, $folder . $gambar);

        // Query untuk mengupdate data di tabel ekstrakulikuler
        $query = "UPDATE ekstrakulikuler SET judul='$judul', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'";
    } else {
        // Jika tidak ada file gambar yang diunggah, gunakan gambar yang sudah ada sebelumnya
        $query = "UPDATE ekstrakulikuler SET judul='$judul', deskripsi='$deskripsi' WHERE id='$id'";
    }

    // Eksekusi query
    mysqli_query($koneksi, $query);
}



// Fungsi untuk menghapus data ekstrakulikuler
function deleteGalleryData($id)
{
    global $koneksi;
    // Query untuk menghapus data dari tabel ekstrakulikuler
    $query = "DELETE FROM ekstrakulikuler WHERE id='$id'";

    // Eksekusi query
    mysqli_query($koneksi, $query);
}

// Cek jika parameter aksi delete telah diberikan
if (isset($_GET['aksi']) && $_GET['aksi'] === 'delete' && isset($_GET['id'])) {
    // Panggil fungsi deleteGalleryData dan kirimkan ID data yang akan dihapus
    deleteGalleryData($_GET['id']);
    // Redirect atau lakukan tindakan lain setelah menghapus data
    header('Location: ekskul.php');
    exit;
}



// Cek jika form telah disubmit untuk menambahkan data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tambah'])) {
    // Panggil fungsi addGalleryData dan kirimkan data dari form
    addGalleryData($_POST);
    // Redirect atau lakukan tindakan lain setelah menambahkan data
    header('Location: ekskul.php');
    exit;
}

// Cek jika form telah disubmit untuk mengupdate data
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    // Panggil fungsi updateGalleryData dan kirimkan ID data yang akan diupdate serta data dari form
    updateGalleryData($_POST['id'], $_POST['data']);
    // Redirect atau lakukan tindakan lain setelah mengupdate data
    header('Location: ekskul.php');
    exit;
}

// Cek apakah ada keyword pencarian
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Query data ekstrakulikuler berdasarkan keyword
    $queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler WHERE judul LIKE '%$keyword%'");
}

// Mendapatkan semua data ekstrakulikuler
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
        <div class="container mt-4">
            <h2>Daftar Ekstrakulikuler</h2>
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
                    foreach ($galleryData as $data) : ?>
                        <tr>
                            <th scope="row"><?= $jumlah++; ?></th>
                            <td><?= $data['judul']; ?></td>
                            <td><?= $data['deskripsi']; ?></td>
                            <td>
                                <img src="image/<?php echo $data['gambar']; ?>" style="width: 80px;">
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>

    </html>
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
    <div class="container mt-4">
        <h2>Daftar Ekstrakulikuler</h2>
        <form id="searchForm" method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Ekstrakulikuler" name="keyword" id="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
        <div class="mb-3">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah</a>
        </div>
        <table class="table" id="ekstrakulikulerTable">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $jumlah = 1;
                foreach ($galleryData as $data) : ?>
                    <tr>
                        <th scope="row"><?= $jumlah++; ?></th>
                        <td><?= $data['judul']; ?></td>
                        <td><?= $data['deskripsi']; ?></td>
                        <td>
                            <img src="image/<?php echo $data['gambar']; ?>" style="width: 80px;">
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id']; ?>">Edit</a>
                            <a href="ekskul.php?aksi=delete&id=<?= $data['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
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


    <!-- Edit -->
    <?php foreach ($galleryData as $data) : ?>
        <div class="modal fade" id="editModal<?= $data['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Galeri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $data['id']; ?>">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['judul']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"><?= $data['deskripsi']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit-gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="edit-gambar" name="gambar">
                            </div>
                            <div class="mb-3">
                                <label>Preview Gambar</label>
                                <?php if ($data['gambar']) { ?>
                                    <img src="image/<?= $data['gambar']; ?>" alt="Preview Gambar" class="img-fluid">
                                <?php } else { ?>
                                    <p>Tidak ada gambar yang tersedia</p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="edit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Edit -->


    <!-- Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Tambah -->


    <!-- footer -->
    <?php require('../partials/footer.php') ?>
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