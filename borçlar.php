<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']==0)) {
  header('location:logout.php');
  } else{

//code deletion
if(isset($_GET['delid']))
{
$rowid=intval($_GET['delid']);
$query=mysqli_query($con,"CALL deletedebt($rowid);");
if($query){
echo "<script>alert('Record successfully deleted');</script>";
echo "<script>window.location.href='borçlar.php'</script>";
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
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bugünün Borçları</h4>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Borç Adı</th>
                          <th>Tutar</th>
                          <th>Son Ödeme Tarihi</th>
                          <th>Borç Kategori</th>
                          <th>Not</th>
                          <th>Sil</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
              $userid=$_SESSION['detsuid'];
              $tdate=date('Y-m-d');
              $ydate=date('Y-m-d',strtotime("-1 days"));
              $pastdate=  date("Y-m-d", strtotime("-1 week")); 
              $crrntdte=date("Y-m-d");
              $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$ret=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where (debt_loan_date)='$tdate' && debt_loan_user_id='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <tr>
                          <td><?php  echo $row['debt_loan_name'];?></td>
                          <td><?php  echo $row['debt_loan_amount'].' ₺';?></td>
                          <td><?php  echo $row['debt_loan_date'];?></td>
                          <td><?php  echo $row['debt_loan_category_name'];?></td>
                          <td><?php  echo $row['debt_loan_note'];?></td>
                          <td><a style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="borçlar.php?delid=<?php echo $row['debt_loan_id'];?>">-</a></td>
                        </tr>
                        <?php 
$cnt=$cnt+1;
}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Dünün Borçları</h4>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Borç Adı</th>
                          <th>Tutar</th>
                          <th>Son Ödeme Tarihi</th>
                          <th>Borç Kategori</th>
                          <th>Not</th>
                          <th>Sil</th>


                        </tr>
                      </thead>
                      <tbody>
                      <?php
              $userid=$_SESSION['detsuid'];
              $tdate=date('Y-m-d');
              $ydate=date('Y-m-d',strtotime("-1 days"));
              $pastdate=  date("Y-m-d", strtotime("-1 week")); 
              $crrntdte=date("Y-m-d");
              $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$ret=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where (debt_loan_date)='$ydate' && debt_loan_user_id='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <tr>
                        <td><?php  echo $row['debt_loan_name'];?></td>
                          <td><?php  echo $row['debt_loan_amount'].' ₺';?></td>
                          <td><?php  echo $row['debt_loan_date'];?></td>
                          <td><?php  echo $row['debt_loan_category_name'];?></td>
                          <td><?php  echo $row['debt_loan_note'];?></td>
                          <td><a style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="borçlar.php?delid=<?php echo $row['debt_loan_id'];?>">-</a></td>
                        </tr>
                        <?php 
$cnt=$cnt+1;
}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Son 1 Haftalık Borç</h4>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Borç Adı</th>
                          <th>Tutar</th>
                          <th>Son Ödeme Tarihi</th>
                          <th>Borç Kategori</th>
                          <th>Not</th>
                          <th>Sil</th>


                        </tr>
                      </thead>
                      <tbody>
                      <?php
              $userid=$_SESSION['detsuid'];
              $tdate=date('Y-m-d');
              $ydate=date('Y-m-d',strtotime("-1 days"));
              $pastdate=  date("Y-m-d", strtotime("-1 week")); 
              $crrntdte=date("Y-m-d");
              $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$ret=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where (debt_loan_date between '$pastdate' and '$crrntdte') && debt_loan_user_id='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <tr>
                        <td><?php  echo $row['debt_loan_name'];?></td>
                          <td><?php  echo $row['debt_loan_amount'].' ₺';?></td>
                          <td><?php  echo $row['debt_loan_date'];?></td>
                          <td><?php  echo $row['debt_loan_category_name'];?></td>
                          <td><?php  echo $row['debt_loan_note'];?></td>
                          <td><a style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="borçlar.php?delid=<?php echo $row['debt_loan_id'];?>">-</a></td>
                        </tr>
                        <?php 
$cnt=$cnt+1;
}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Son 1 Aylık Borç</h4>
                  
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Borç Adı</th>
                          <th>Tutar</th>
                          <th>Son Ödeme Tarihi</th>
                          <th>Borç Kategori</th>
                          <th>Not</th>
                          <th>Sil</th>


                        </tr>
                      </thead>
                      <tbody>
                      <?php
              $userid=$_SESSION['detsuid'];
              $tdate=date('Y-m-d');
              $ydate=date('Y-m-d',strtotime("-1 days"));
              $pastdate=  date("Y-m-d", strtotime("-1 week")); 
              $crrntdte=date("Y-m-d");
              $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$ret=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where (debt_loan_date between '$monthdate' and '$crrntdte') && debt_loan_user_id='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <tr>
                        <td><?php  echo $row['debt_loan_name'];?></td>
                          <td><?php  echo $row['debt_loan_amount'].' ₺';?></td>
                          <td><?php  echo $row['debt_loan_date'];?></td>
                          <td><?php  echo $row['debt_loan_category_name'];?></td>
                          <td><?php  echo $row['debt_loan_note'];?></td>
                          <td><a style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="borçlar.php?delid=<?php echo $row['debt_loan_id'];?>">-</a></td>
                        </tr>
                        <?php 
$cnt=$cnt+1;
}?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Seçtiğiniz Son Ödeme Tarihi Aralığındaki borçlariniz</h4>
                  <form role="form" method="post" action="">
								<div class="form-group">
									<label>Borç Son Ödeme Tarihi Aralığı</label>
									<input class="form-control" type="date" value="" name="datedebt_loan" required="true"><br>
                  <input class="form-control" type="date" value="" name="datedebt_loan2" required="true"><br>
                  <button type="submit" class="btn btn-primary" name="submit" class="btn btn-primary">Onayla</button>
								</div>
</form>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        <th>Borç Adı</th>
                          <th>Tutar</th>
                          <th>Son Ödeme Tarihi</th>
                          <th>Borç Kategori</th>
                          <th>Not</th>
                          <th>Sil</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php
              $userid=$_SESSION['detsuid'];
              $datedebt_loan=$_POST['datedebt_loan'];
              $datedebt_loan2=$_POST['datedebt_loan2'];

              $tdate=date('Y-m-d');
              $ydate=date('Y-m-d',strtotime("-1 days"));
              $pastdate=  date("Y-m-d", strtotime("-1 week")); 
              $crrntdte=date("Y-m-d");
              $monthdate=  date("Y-m-d", strtotime("-1 month")); 
$ret=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where (debt_loan_date between '$datedebt_loan' and '$datedebt_loan2') && debt_loan_user_id='$userid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                        <tr>
                        <td><?php  echo $row['debt_loan_name'];?></td>
                          <td><?php  echo $row['debt_loan_amount'].' ₺';?></td>
                          <td><?php  echo $row['debt_loan_date'];?></td>
                          <td><?php  echo $row['debt_loan_category_name'];?></td>
                          <td><?php  echo $row['debt_loan_note'];?></td>
                          <td><a style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="borçlar.php?delid=<?php echo $row['debt_loan_id'];?>">-</a></td>
                        </tr>
                        <?php 
$cnt=$cnt+1;
}?>
                      
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.php -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
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
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
<?php }  ?>