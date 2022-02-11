<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['name'];
    $mobno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' ");
    $result=mysqli_fetch_array($ret);
    if($result>0){
$msg="This email  associated with another account";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FullName, MobileNumber, Email,  Password) value('$fname', '$mobno', '$email', '$password' )");
    if ($query) {
    $msg="You have successfully registered";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
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

  <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

</script>
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
              <h4>Yeni misiniz?</h4>
              <h6 class="font-weight-light">Sadece birkaç adımda kolayca üye olun.</h6>
              <form class="pt-3" role="form" action="" method="post" id="" name="signup" onsubmit="return checkpass();">
              <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" placeholder="Ad Soyad" name="name" type="text" required="true">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg"  placeholder="E-mail" name="email" type="email" required="true">
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="mobilenumber" name="mobilenumber" placeholder="Telefon Numarası" maxlength="10" pattern="[0-9]{10}" required="true">
                </div>
                
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" placeholder="Şifre" name="password" type="password" value="" required="true">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="repeatpassword"  name="repeatpassword" placeholder="Şifre Tekrar">
                </div>
                
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" value="submit" name="submit">Kayıt Ol</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Zaten hesabınız var mı? <a href="login.php" class="text-primary">Giriş</a>
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
  <!-- endinject -->
</body>

</html>
