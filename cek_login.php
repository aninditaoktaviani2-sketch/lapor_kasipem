<?php
session_start();
include "config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];

        header("Location: admin/dashboard.php");
        exit;

    } else {

        echo "<script>
                alert('Username atau Password Salah!');
                window.location='login.php';
              </script>";

    }

} else {

    header("Location: login.php");
    exit;

}
?>