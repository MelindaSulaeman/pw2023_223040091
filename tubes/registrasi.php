<?php 
$title = 'Register';



require('function.php');

if (isset($_POST['submit'])) {
    $conn = koneksi();

    $username =     $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];


    $sql = "SELECT * FROM `users` WHERE `username` = '{$username}'";
    $user = query($sql);

    if (!count($user) > 0) {

        if ($password === $confirm_password) {

            $query = "INSERT INTO users(username, email, password, level) VALUES ('$username','$email', '$password', 'user')";

            mysqli_query($conn, $query) or die(mysqli_error($conn));
            echo "<script>alert('Registrasi Berhasil'); window.location.href='login.php';</script>";
        } else {
            echo "<script>alert('Konfirmasi Password salah'); window.location.href='registrasi.php';</script>";
        }
    } else {
        echo "<script>alert('Username sudah digunakan'); window.location.href='registrasi.php';</script>";
    }
}
require('views/registrasi.view.php'); 
?>