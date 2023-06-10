<?php require('partials/header.php'); ?>
<?php require('partials/nav.php'); ?>
<div id="carouselExampleCaptions" class="carousel slide mb-3" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="img-fluid w-100 h-100 overflow-hidden" src="img/gallery.jpg" alt="...">
            <div class="carousel-caption d-block">
                <h5>BINA NUSANTARA</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100 h-100 overflow-hidden" src="img/hero2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Melahirkan Lulusan Terbaik Setiap Tahun.</h5>
                
            </div>
        </div>
        <div class="carousel-item">
            <img class="img-fluid w-100 h-100 overflow-hidden" src="img/siswa.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-block">
                <h5>Pembelajaran Efektif di Kelas</h5>
                
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<?php require('partials/footer.php'); ?>