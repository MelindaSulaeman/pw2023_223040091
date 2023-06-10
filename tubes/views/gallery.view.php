<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>
<section>
    <div class="container">
        <h2 class="h1-responsive font-weight-bold text-center my-4">Gallery</h2>
        <!-- Gallery -->
        <div class="row">
            <?php while ($data = mysqli_fetch_array($queryGallery)) { ?>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="adminpanel/image/<?php echo $data['gambar']; ?>" class="w-100 shadow-1-strong rounded mb-4" alt="lapangan" />
                </div>
            <?php } ?>
        </div>
        <!-- Gallery -->
    </div>
</section>
<?php require('partials/footer.php'); ?>