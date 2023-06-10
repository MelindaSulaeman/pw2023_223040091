<?php
require('partials/header.php');
require('partials/nav.php');

if (isset($_GET['judul'])) {
    $judul = htmlspecialchars($_GET['judul']);

    // query data ekstrakulikuler
    $queryEkskul = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler WHERE judul='$judul'");
    $data = mysqli_fetch_array($queryEkskul);
} else {
    $data = null;
}
?>

<section class="about" id="about">
    <div class="container">
        <div class="main-txt">
            <h1>BINA NUSANTARA</h1>
        </div>
        <div class="row" style="margin-top: 50px;">
            <?php if ($data) { ?>
                <div class="col-md-3 py-4 py-md-0">
                    <div class="card">
                        <img src="adminpanel/image/<?php echo $data['gambar']; ?>" alt="About">
                    </div>
                </div>

                <div class="col-md-6 py-6 py-md-0">
                    <h4><?php echo $data['judul']; ?></h4>
                    <p><?php echo $data['deskripsi']; ?></p>
                </div>
            <?php } else { ?>
                <div class="col-md-12">
                    <p>Tidak ada data yang ditemukan.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require('partials/footer.php'); ?>