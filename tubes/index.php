<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>EduKomputer</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600&display=swap" rel="stylesheet">
    
    <script src="https://unpkg.com/feather-icons"></script>
    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
}

body {
    font-family: "Ppopins", sans-serif;
    background-color: var(--background);
    color: brown;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.4rem 7%;
    border-bottom: 1px solid #513c28;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 9999;
    background-color: rgb(113, 174, 71);
}

.navbar .navbar-logo {
    font-size: 2rem;
    font-weight: 700;
    color: #fff ;

}

.navbar .navbar-logo span {
    color:rgb(205, 80, 71) ;
}

.navbar .navbar-nav a {
    color: rgb(11, 11, 11);
    display: inline-block;
    font-size: 1rem;
    margin: 0 1rem;
}

.navbar .navbar-nav a:hover {
    color: rgb(205, 80, 71);
}

.navbar .navbar-nav a::after {
    content: '';
    display: block;
    padding-bottom: 0.5rem;
    border-bottom: 0.1rem solid rgb(83, 150, 83);
    transform: scaleX(0);
    transition: 0.2s linear;
}

.navbar .navbar-nav a:hover::after {
    transform: scaleX(0.5);
}

.navbar .navbar-extra a {
    color: #010101;
    margin: 0 0.5rem;
}

.navbar .navbar-extra a:hover {
    color: #fff;
}

#hamburger-menu {
    display: none;
}

/*hero*/
.hero {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background-image: url('css/img/background-hero.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: fill;
    position: relative;
}

.hero .content {
    padding: 1.4rem 7%;
    max-width: 60rem;
}

.hero::after {
    content: '';
    display: block;
    position: absolute;
    width: 100%;
    height: 30%;
    bottom: 0;
}

.hero .content h1 {
    font-size: 2.7rem;
    color: rgb(113, 174, 71);
    text-shadow: 1px 1px 3px green;
    line-height: 1.2;
}


.hero .content p {
    font-size: 1.6rem;
    margin-top: 1rem;
    line-height: 1.4;
    color: rgb(113, 174, 71);
    text-shadow: 1px 1px 3px green;
}

.hero .content .cta {
    margin-top: 1rem;
    display: inline-block;
    padding: 1rem 3rem;
    font-size: 1rem;
    color: #101010;
    background-color:  rgb(113, 174, 71);
    border-radius: 0.5rem;
    box-shadow: 1px 1px 3px #101010;

}

.about, .materi {
    padding: 8rem 7% 1.4rem;
}

.about h2, .materi h2 {
    text-align: center;
    font-size: 3rem;
    margin-bottom: 3rem;
    color: green;
}

.about .row {
    display: flex;
}

.about .row .about-img {
    flex: 1 1 45rem;
}

.about .row .about-img  img {
    width: 80%;
}

.about .row .content {
    flex: 1 1 35rem;
    padding: 0 1rem;

}

.about .row .content h3 {
    font-size: 1.8rem;
    margin-bottom: 1rem;

}

.about .row .content p{
    margin-bottom: 0.8rem;
    font-size: 1.3rem;
    font-weight: 100;
    line-height: 1.6;
    color: ;
}

.materi h2 {
    margin-bottom: 2.3rem;
}

.materi p{
    text-align: center;
    max-width: 50rem;
    margin: auto;
    font-weight: 100;
    line-height: 1.5;
    font-size: 1.5rem;
}

.materi .row {  
    display: flex;
    flex-wrap: wrap;
    margin-top: 5rem;
    justify-content: center;

}

.materi-card {
    text-align: center;
}

.materi .row .materi-card{
    text-align: left;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 2rem;
    align-items: center;

}

.materi .row .materi-card img {
    border-radius: 60%;
    width: 50%;
    padding: 2rem;
}

.materi .row .materi-card h3 {
    font-size: 2rem;
}


.materi .row .materi-card .materi-card-title{
    margin-top: 1rem auto 0.5rem ;
    text-align: left;
}

.materi .row .materi-card .cta {
    margin-top: 1rem;
    display: inline-block;
    padding: 1rem 1rem;
    font-size: 1rem;
    color: #101010;
    background-color:  rgb(113, 174, 71);
    border-radius: 0.5rem;
    box-shadow: 1px 1px 3px #101010;
    width: 40%;
    text-align: center;

}

footer{
    background-color: rgb(90, 90, 90);
    text-align: center;
    padding: 1rem 3rem;
    margin-top: 3rem;
}

footer .social{
    padding: 1rem 0;
}

footer .social a{
    color: #fff;
    margin: 1rem;
}

footer .social a:hover, 
footer .links a:hover{
    color:  rgb(205, 80, 71);
}

footer .links {
    margin-bottom: 1.4rem;
}

footer .links a{
    color: #fff;
    padding: 0.7rem 1rem;

}

footer .credit {
    font-size : 1rem;
}

footer .credit p{
    color: #fff;
}

footer .credit a{
    font-weight: 600;
}

/*destop*/
@media (max-width: 1366px) {
    html {
        font-size: 75%;
    }
}

/*tab*/
@media (max-width: 768px) {
    html {
        font-size: 62.5%;
    }

    #hamburger-menu {
        display: inline-block;
    }

    .navbar .navbar-nav {
        position: absolute;
        top: 100%;
        right: -100%;
        background-color: #fff;
        width: 30rem;
        height: 100vh;
        transition: 0.3s;
    }

    .navbar .navbar-nav.active {
        right: 0;
    }

    .navbar .navbar-nav a {
        color: green;
        display: block;
        margin: 1.5rem;
        padding: 0.5rem;
        font-size: 2rem;
    }

    .navbar .navbar-nav a:hover::after {
        transform: scaleX(0.2);
    }

    .about .row {
        flex: wrap;
    }

    .about .row .about-img  img {
        height: 24rem;
        object-fit: cover;
        object-position: center;
    }

    .about .row .content {
        padding: 0;
    }

    .about .row .content h3 {
        margin-top: 1rem;
        font-size: 2rem;
    }

    .about .row .content p {
        font-size: 1.5rem;
    }

   
    /*mobile*/
    @media (max-width: 576px) {
        html {
            font-size: 55%;
        }
    }
    }
    </style>
</head>
<body>
    
    <nav class="navbar">
        <a href="#" class="navbar-logo">Edu<span>Komputer</span></a>

        <div class="navbar-nav">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#materi">Materi</a>
            <a href="#login">Login</a>
        </div>

        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>

    <section class="hero" id="home">
        <main class="content" >
            <h1>Kembangkan Potensi Anda di Era Digital</h1>
            <p>Menggapai Masa Depan yang Cerah melalui Penguasaan Komputer Dasar  </p>
            <a href="#materi" class="cta">Klik Disini</a>
        </main>
    </section>

    <section id="about" class="about">
        <h2>Tentang Kami</h2>

        <div class="row">
            <div class="about-img">
                <img src="css/img/about.jpg" alt="about">
            </div>
            <div class="content">
                <h3>Memperkuat dasar-dasar Teknologi</h3>
                <p>Belajar komputer dasar adalah untuk memahami prinsip dasar teknologi komputer dan penggunaannya, sehingga dapat meningkatkan kemampuan pengguna dalam menggunakan komputer dengan efektif dan efisien.</p>
                <p>Meningkatkan keterampilan teknologi dan kemampuan untuk mengikuti perkembangan teknologi komputer yang terus berubah.</p>
                <p>Meningkatkan kemampuan pengguna dalam memecahkan masalah dan mencari solusi melalui penggunaan teknologi komputer</p>

            </div>
        </div>
    </section>

    <section id="materi" class="materi">
        <h2>Materi</h2>
        <p>Kami akan memberikan materi secara sistematis dan terstruktur agar Anda dapat memahami dengan mudah dan Website kami juga berfokus pada penyampaian materi dengan cara yang sederhana dan efektif.</p>
        
        <div class="row">
            <div class="materi-card">
                <img src="css/img/materi1.png" alt="materi1" class="materi-card-img">
                <h3 class="materi-card-title">Sejarah Komputer</h3>
                <p>Sejarah dan perkembangan Komputer.</p>
                <a href="#" class="cta">Read More</a>
            </div>
            

            <div class="materi-card">
                <img src="css/img/materi2.jpg" alt="materi2" class="materi-card-img">
                <h3 class="materi-card-title">Sistem Operasi</h3>
                <p>Pengenalan tentang Sistem Operasi.</p>
                <a href="#" class="cta">Read More</a>
            </div>

            <div class="materi-card">
                <img src="css/img/materi3.jpg" alt="materi3" class="materi-card-img">
                <h3 class="materi-card-title">Microsoft Word</h3>
                <p>Pengenalan singkat tentang Microsoft Word</p>
                <a href="#" class="cta">Read More</a>
            </div>
            
            <div class="materi-card">
                <img src="css/img/materi4.png" alt="materi4" class="materi-card-img">
                <h3 class="materi-card-title">Microsoft Excel</h3>
                <p>Pengenalan singkat tentang Microsoft Excel</p>
                <a href="#" class="cta">Read More</a>
            </div>
            
            <div class="materi-card">
                <img src="css/img/materi5.png" alt="materi5" class="materi-card-img">
                <h3 class="materi-card-title">PowerPoint</h3>
                <p>Pengenalan singkat tentang PowerPoint</p>
                <a href="#" class="cta">Read More</a>
            </div>
            
        </div>
    </section>

    <footer>
        <div class="social">
            <a href="#"><li data-feather="instagram"></li></a>
            <a href="#"><li data-feather="twitter"></li></a>
            <a href="#"><li data-feather="facebook"></li></a>
            <a href="#"><li data-feather="mail"></li></a>
            <a href="#"><li data-feather="phone"></li></a>
        </div>

       <div class="links">
            <a href="#home">Home</a>
            <a href="#about">Tentang Kami</a>
            <a href="#materi">Materi</a>
            <a href="#login">Login</a>
       </div>

       <div class="credit">
        <p>Created by <a href="">Melinda Sulaeman</a>. | &copy; 2023.</p>
       </div>
    </footer>

    <script>
      feather.replace()
    </script>

    <script src="js/script.js"></script>
</body>
</html>