<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>
    <style>
      body{
        font-family: 'montserrat', sans-serif;
        weight: 100%;
      }
      .Admin a {
        font-size: 1.5rem;
        
      }

      .Admin {
        font-size: 3rem;
        color: rgb(113, 174, 71);
        
       
      }
      .navbar {
        margin-bottom: 0;
        color: ;
      }

      .navbar-brand{
        color: #fff;
        background-color: rgb(113, 174, 71);
        padding: 1rem 1rem;
        display: inline-block;
        width: 100%;
        
      }

     
      .sidebar{
        
        height: 100%;
        background:rgb(90, 90, 90);
        position: absolute;
        z-index: 100;
        padding: 0 1rem ;
        
      
      }
      ul {
        padding: 0;
        margin-left: -40px;
    
      }
      ul li{
        list-style: none;
        border-bottom: 2px solid rgba(100, 100, 200, 0.5); 
      }
      ul li a{
        text-decoration: none;
        color: #aeb2b7;
        display: block;
        padding: 19px 0px 18px 25px;
        transition: all 200ms ease-in;
      }
      ul li a:hover{
        text-decoration: none;
        color: $eeeee;
      }
      ul li a:visited{
        text-decoration: none;
        color: #fff;
      }


      ul ul{
        display: none;
        margin:0px;
      }
      ul li a .fa-angle-down{
        margin-right: 10px;
      }

      .content .inner {
        padding: 0 15rem;
        margin top: 3rem;
        font-size: 1.5rem;
      }

      /apabila lebar min 768px/
      @media(min-width: 768px) {
        .sidebar{
          width: 250px;
        }
        .content{
          margin-left: 200px;
        }
        .inner{
          padding: 15px;
        }
      }
    </style>
  </head>
  <body>
    <div class="Admin">
      <nav class="navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">EduKomputer</a>
        </div>
      </nav>
      <aside class="sidebar">
        <menu>
          <ul class="menu-content">
            <li><a href=""> Home</a></li>
            <li><a href="registrasi.php">Registration </a></li>
            <li><a href="login.php">Log out</a></li>
          </ul>
        </menu>
      </aside>
      <section class="content">
        <div class="inner">
          <p>Dashboard</p>
        </div>
      </section>

      <script>
      feather.replace()
      </script>
    </body>
</html>
