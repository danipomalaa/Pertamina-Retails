
<html>
<head>
<title>LOGIN</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/animate.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body class="gray-bg">
<center>
<img src="img/logo2.png" style="width:263px; height:361px;" alt="" />
<br />
<strong>Selamat datang di Apprenternship+</strong><br />
<br />
<form action="" method="post" name="login">
<div class="form-group">
<input name="username" type="text" style="width:350px;" class="form-control" placeholder="Username/ email" required="" />
</div>
<div class="form-group">
<input name="password" type="password" style="width:350px;" class="form-control" placeholder="Password" required="" />
</div>
<div class="form-group">
<input name="submit" value="LOGIN" style="width:350px;" class="btn btn-info" type="submit"/>
</div>
<a href="">
Lupa password?
</a>
<div class="form-group"><br>
<a href="halaman_daftar.php" style="width:350px" class="btn btn-warning">REGISTER</a>
</div>
</form>
</center>
<script src="js/plugins/validate/jquery.validate.min.js"></script>
<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
</body>
</html>

<?php
include('koneksi.php');
if(ISSET($_POST['submit'])){
 $username = $_POST['username'];
 $password = $_POST['password'];

 $username = stripslashes($username);
 $password = stripslashes($password);
 $username = mysqli_real_escape_string($conn,$username);
 $password = mysqli_real_escape_string($conn,$password);

 $data = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tbl_user WHERE (username='$username' || email='$username') AND password='$password'"));

 if(empty($data)){
   echo "<script language=\"javascript\">alert(\"Password atau Username Salah !\");document.location.href='login.php';</script>";
 } else {
   session_start();
   $_SESSION['user_id'] = $data['user_id'];
   if($data['level_user']=="admin"){
      header("location:admin/dashboard.php");
   }
   elseif ($data['level_user']=="site manager"){
      $user_id = $data['user_id'];
      $lokasi = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM tbl_sitemanager where user_id= '$user_id' "));
      $kode = $lokasi['kode_lokasi'];
      header("location:SiteManager/dashboard.php?id=".$data['user_id']."&kode=".$kode." ");
   }
   elseif ($data['level_user']=="peserta"){
      header("location:peserta/profile.php?id=".$data['user_id']." ");
   }
   elseif ($data['level_user']=="agent"){
      header("location:Agent/dashboard.php?id=".$data['user_id']." ");
   }
   elseif ($data['level_user']=="assessor"){
      header("location:Assessor/seleksi.php");
   }
   
 }
}
?>
