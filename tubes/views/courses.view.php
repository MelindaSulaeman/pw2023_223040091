<?php
require('partials/header.php');
require('partials/nav.php');

$queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler");

// Cek apakah ada keyword pencarian
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];

    // Query data ekstrakulikuler berdasarkan keyword
    $queryEkstrakulikuler = mysqli_query($koneksi, "SELECT * FROM ekstrakulikuler WHERE judul LIKE '%$keyword%'");
}

?>

<section>
    <div class="container course pb-5 pt-5">
        <h2 class="h1-responsive font-weight-bold text-center my-4">Ekstrakulikuler</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">
            Ekstrakurikuler adalah kegiatan yang dilakukan di luar jam pelajaran resmi di sekolah. Kegiatan ini tidak termasuk dalam kurikulum wajib, namun memberikan siswa kesempatan untuk mengembangkan minat, bakat, dan keterampilan di bidang-bidang tertentu. Sekolah kami menyediakan beberapa Ekstrakulikuler diantaranya :</p>
        <form id="searchForm" method="GET" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Cari Ekstrakulikuler" name="keyword" id="keyword">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
            </div>
        </form>
        <div class="row" id="ekstrakulikulerTable">
            <?php
            // Cek apakah ada hasil pencarian
            if (mysqli_num_rows($queryEkstrakulikuler) > 0) {
                while ($data = mysqli_fetch_array($queryEkstrakulikuler)) {
            ?>
                    <div class="col-md-4">
                        <div class="card box">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="adminpanel/image/<?php echo $data['gambar']; ?>" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['judul']; ?></h5>
                                <p class="card-text"><?php echo $data['deskripsi']; ?></p>
                                <a href="readmore.php?judul=<?php echo urlencode($data['judul']); ?>" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                // Tampilkan alert jika tidak ada hasil pencarian
                echo '<div class="alert alert-info" role="alert">
                Tidak ada hasil pencarian.
              </div>';
            }
            ?>
        </div>

    </div>
</section>

<?php require('partials/footer.php'); ?>