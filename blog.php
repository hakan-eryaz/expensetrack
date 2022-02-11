<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_GET['delete']))
    {
    $rowid=intval($_GET['delete']);
    $query=mysqli_query($con,"CALL deletetodo($rowid);");
    if($query){
    echo "<script>alert('Record successfully deleted');</script>";
    echo "<script>window.location.href='index.php'</script>";
    } else {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    
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
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
    <?php
      include "_navbar.php";
      ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.php -->
      <?php
      include "_settings-panel.php";
      ?>
      <!-- partial -->
      <!-- partial:partials/_sidebar.php -->
      <?php
      include "_sidebar.php";
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php
            $userid=$_SESSION['detsuid'];
              $ret=mysqli_query($con,"select FullName from tbluser where ID='$userid'");
              $row=mysqli_fetch_array($ret);
              echo $row['FullName'];
              ?></h3>
                </div>
                
              </div>
            </div>
          </div>

          <?php
          $kaynak = file_get_contents("https://geoiptool.com/en/?ip=95.70.129.8");
          preg_match_all('@<div class="data-item">(.*?)</div>@si',$kaynak,$sonuc);
 
 

          ?>



          
          
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Haberler</h4>
                  <p class="card-description">
                    Ekonomide Öne Çıkanlar
                  </p>
<div style="font: normal 20px Arial; width: %100px; border: solid 1px #ccc; background: #fff; border-radius: 3px; box-shadow: 1px 1px 3px #ccc;">
    <iframe frameborder="0" width="1520px" height="500" src="https://www.trthaber.com/sitene-ekle/ekonomi-7/?haberSay=10&renk=a&resimler=1"></iframe>
    
</div>

                </div>
              </div>
            </div>
            
          </div>
                      
                      
                
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <?php
      include "_footer.php";
      ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <script src="js/chart.js"></script>

  <!-- End custom js for this page-->
</body>

</html>
<?php } ?>