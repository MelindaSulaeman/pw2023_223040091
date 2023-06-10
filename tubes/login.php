<?php
require('function.php');
$title = 'Login';

if (isset($_POST["submit"])) {
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $conn = koneksi();
    $sql = "SELECT * FROM `users` WHERE `email` = '{$email}' AND `password` = '{$password}'";
    $query = mysqli_query($conn, $sql);
    $user = mysqli_fetch_array($query);
    if ($query->num_rows > 0) {
        $_SESSION['user'] = $user;

        if ($user['level'] == 'admin') {
            echo "<script>alert('Login berhasil!'); window.location.href='adminpanel/admin.php';</script>";
        } else {
            echo "<script>alert('Login berhasil!'); window.location.href='adminpanel/adminuser/admin.php';</script>";
        }
    } else {
        echo "<script>alert('Email dan Password salah'); window.location.href='login.php';</script>";
    }
}


require('views/login.view.php');
