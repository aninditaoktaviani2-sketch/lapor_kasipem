<?php
session_start();

if(isset($_SESSION['login'])){
    header("Location: admin/dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login Admin</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>


*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}


body{

    background:linear-gradient(135deg,#14532d,#22c55e,#86efac);

    height:100vh;

    display:flex;

    justify-content:center;

    align-items:center;

}



.card-login{

    width:420px;

    background:white;

    border-radius:20px;

    padding:35px;

    box-shadow:0 15px 35px rgba(0,0,0,.25);

}



.logo{

    width:90px;

    display:block;

    margin:auto;

    margin-bottom:15px;

}



h3{

    text-align:center;

    color:#166534;

    font-weight:bold;

}



p{

    text-align:center;

    color:#666;

    margin-bottom:25px;

}



.form-control{

    height:48px;

    border-radius:0 10px 10px 0;

}



.form-control:focus{

    border-color:#22c55e;

    box-shadow:0 0 10px rgba(34,197,green,.4);

}



.input-group-text{

    background:#22c55e;

    color:white;

    border:none;

}



.password-eye{

    cursor:pointer;

    background:#22c55e;

    color:white;

    border:none;

}



.btn-login{

    width:100%;

    height:48px;

    background:#15803d;

    color:white;

    font-weight:bold;

    border:none;

    border-radius:10px;

    transition:.3s;

}



.btn-login:hover{

    background:#166534;

}



.footer{

    margin-top:20px;

    text-align:center;

    font-size:13px;

    color:#777;

}


</style>


</head>


<body>



<div class="card-login">


<img src="assets/img/logo.png" class="logo">



<h3>Sistem Informasi</h3>


<p>
Pengelolaan Data Laporan Kasipem Kecamatan Panguragan
</p>




<form action="cek_login.php" method="POST">



<div class="mb-3">


<label class="mb-2">
Username
</label>



<div class="input-group">


<span class="input-group-text">

<i class="bi bi-person-fill"></i>

</span>



<input
type="text"
name="username"
class="form-control"
placeholder="Masukkan Username"
required>



</div>


</div>





<div class="mb-4">


<label class="mb-2">
Password
</label>



<div class="input-group">



<span class="input-group-text">

<i class="bi bi-lock-fill"></i>

</span>



<input
type="password"
name="password"
id="password"
class="form-control"
placeholder="Masukkan Password"
required>




<span class="input-group-text password-eye" onclick="lihatPassword()">

<i class="bi bi-eye" id="iconPassword"></i>

</span>



</div>


</div>





<button class="btn btn-login">


<i class="bi bi-box-arrow-in-right"></i>

Login


</button>



</form>




<div class="footer">

© 2026 Kecamatan Panguragan

</div>



</div>





<script>


function lihatPassword(){


let password = document.getElementById("password");

let icon = document.getElementById("iconPassword");



if(password.type === "password"){


password.type = "text";


icon.classList.remove("bi-eye");

icon.classList.add("bi-eye-slash");



}else{


password.type = "password";


icon.classList.remove("bi-eye-slash");

icon.classList.add("bi-eye");


}



}



</script>



</body>

</html>