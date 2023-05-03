
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{
            height: 100vh;
        }
        .container{
            position: fixed;
            left: 40%;
            top: 20%;
            padding: 20px 25px;
            width: 300px;
            background-color: ;
            box-shadow: 0 0 10px rgba(255,255,255,.3);
            color: green;
        }

        .container h1{
            text-align: center;
            margin-bottom: 30px;
            margin: 30px;
        }
        .container form button{
            background-color: green;
            font-size: 1rem;
            color: white;
            padding: 5px 0;
            width: 100%;
            border: none;

        }
        .container form input{
            font-size: 16px;
            width: 100% ;
            padding: 8px 10px;
            margin-bottom: 15px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid #101010;
            color: #101010;
            
        }
        .container label{
            text-align: left;
        }
        .container a{
            padding-bottom: 50px;
           
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>  
 
        <form action="admin.php" method="post">
            
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
            
            <label for="password">Password  :</label>
            <input type="password" name="password" id="password">
            
            <button type="submit" name="submit" >Login</button>
                
        </form>

        <p>Don't have account? <a href="registrasi.php">SignUp </a></p>
    </div>
</body>
</html>