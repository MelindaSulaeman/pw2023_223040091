<footer>
    <div class="social">
        <a href="#">
            <li data-feather="instagram"></li>
        </a>
        <a href="#">
            <li data-feather="twitter"></li>
        </a>
        <a href="#">
            <li data-feather="facebook"></li>
        </a>
        <a href="#">
            <li data-feather="mail"></li>
        </a>
        <a href="#">
            <li data-feather="phone"></li>
        </a>
    </div>

    <div class="links">
        <a href="hero.php">Home</a>
        <a href="about.php">About</a>
        <a href="about.php">Ekstrakulikuler</a>
        <a href="materi.php">Gallery</a>
        <a href="login.php">Contact Us</a>
    </div>

    <div class="credit">
        <p>Created by <a href="">Melinda Sulaeman</a>. | &copy; 2023.</p>
    </div>
</footer>
<script>
    feather.replace()
</script>
<style>
    footer {
        background-color: #1a1e21;
        text-align: center;
        padding: 1rem;
        margin-top: 10rem;
        text-decoration: none;
    }

    footer .social {
        padding: 1rem 0;
        display: flex;
        justify-content: center;
    }

    footer .social a {
        color: #fff;
        margin: 0 0.5rem;
        text-decoration: none;
    }

    footer .social a:hover,
    footer .links a:hover {
        color: blue;
    }

    footer .links {
        margin-bottom: 1.4rem;
    }

    footer .links a {
        color: #fff;
        padding: 0.7rem 1rem;
        text-decoration: none;
    }

    footer .credit {
        font-size: 1rem;
    }

    footer .credit p {
        color: #fff;
    }

    footer .credit a {
        font-weight: 600;
        color: rgb(205, 80, 71);
        text-decoration: none;
    }

    /* Responsiveness */
    @media only screen and (max-width: 600px) {
        footer .social {
            flex-wrap: wrap;
        }

        footer .social a {
            margin: 0.5rem;
        }
    }
</style>
</body>

</html>