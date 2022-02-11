<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"select ID from tbluser where Email='$email' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
     header('location:index.php');
    }
    else{
    $msg="Invalid Details.";

    }
  }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Merhaba! Haydi başlayalım.</h4>
              
              <h6 class="font-weight-light">Devam etmek için giriş yapın.</h6>
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
              <form class="pt-3" role="form" action="" method="post" id="" name="login">
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" placeholder="E-mail" name="email" type="email" autofocus="" required="true">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Şifre" name="password" type="password" value="" required="true">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="login" name="login">Giriş</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  
                  
                </div>
                
                <div class="text-center mt-4 font-weight-light">
                  Hesabınız yok mu? <a href="register.php" class="text-primary">Kayıt ol</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
  <!-- endinject -->
</body>

</html>
