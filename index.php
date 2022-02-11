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
    if(isset($_POST['submit']))
    {
      if(isset($_SESSION['detsuid'])){
        $userid		=	intval($_POST['detsuid']);
      }else{
        $userid		=	"";
      }

      if(isset($_POST['todo'])){
        $todo		=	$_POST['todo'];
      }else{
        $todo		=	"";
      }
      if(isset($_POST['date'])){
        $date				=	$_POST['date'];
      }else{
        $date				=	"";
      }
      $query=mysqli_query($con,"insert into todo(user_id,todo_name,todo_date) VALUES(12,'$todo','$date')");
    if($query){
    echo "<script>alert('Record successfully added');</script>";
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
                  <h3 class="font-weight-bold">Hoşgeldin <?php
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

          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img style="height:350px;" src="images/dashboard/new.svg" alt="people">

                </div>
              </div>
            </div>

            <?php
            $userid=$_SESSION['detsuid'];
            $tdate=date('Y-m-d');
            $ydate=date('Y-m-d',strtotime("-1 days"));
            $pastdate=  date("Y-m-d", strtotime("-1 week")); 
            $crrntdte=date("Y-m-d");
            $monthdate=  date("Y-m-d", strtotime("-1 month")); 
            ?>

            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Bugünkü Toplam Harcama</p>
                      
                      <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(expense_amount)  as todaysexpense from expenses where (expense_date)='$tdate' && expense_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 
<p class="fs-30 mb-2"><?php
echo doubleval($sum_today_expense).' ₺';
?></p>
						
</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                  <div class="card-body">
                      <p class="mb-4">Dünkü Toplam Harcama</p>
                      
                      <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(expense_amount)  as todaysexpense from expenses where (expense_date)='$ydate' && expense_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 
<p class="fs-30 mb-2"><?php
echo doubleval($sum_today_expense).' ₺';
?></p>
</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                  <div class="card-body">
                      <p class="mb-4">Son 7 Gün Toplam Harcama</p>
                      <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(expense_amount)  as todaysexpense from expenses where (expense_date between '$pastdate' and '$crrntdte') && expense_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 
<p class="fs-30 mb-2"><?php
echo doubleval($sum_today_expense).' ₺';
?></p>
</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                  <div class="card-body">
                      <p class="mb-4">Son 30 Gün Toplam Harcama</p>
                      
                      <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(expense_amount)  as todaysexpense from expenses where (expense_date between '$monthdate' and '$crrntdte') && expense_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 
<p class="fs-30 mb-2"><?php
echo doubleval($sum_today_expense).' ₺';
?></p>
						
</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Harcama Kategoriler Ve Alt Kalemleri</p>
                            <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(expense_amount)  as todaysexpense from expenses where expense_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_expense=$result['todaysexpense'];
 ?> 

                              <h1 class="text-primary"><?php
echo doubleval($sum_today_expense).' ₺';
?></h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Toplam Harcama tutarı</h3>
                              <p class="mb-2 mb-xl-0">Yapılmış toplam harcama ve bu harcamanın alt kalemleri.</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                  <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select expense_categories.expense_category_name,sum(expenses.expense_amount)  as todaysexpense from expenses LEFT JOIN expense_categories ON expenses.expense_categories_id=expense_categories.expense_category_id where expense_user_id='$userid' group by expense_categories.expense_category_name order by todaysexpense DESC");
while ($row=mysqli_fetch_array($query)) { ?> 

<tr>
                                      <td class="text-muted"><?php
echo $row['expense_category_name'];
?></td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: <?php
echo doubleval(($row['todaysexpense']/$sum_today_expense)*100).'%';
?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0"><?php
echo doubleval($row['todaysexpense']).' ₺';
?></h5></td>
                                    </tr>
                              
<?php 
$cnt=$cnt+1;
}?>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                              <h3 class="font-weight-500 mb-xl-4 text-primary">En çok harcama yapılan ürünler</h3>


                              <table class="table table-borderless report-table">
<?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select expense_name,sum(expense_amount) as todaysexpense from expenses where expense_user_id='$userid' group by expenses.expense_name order by todaysexpense DESC LIMIT 10");
while ($row=mysqli_fetch_array($query)) { ?> 

<tr>
    <td class="text-muted"><?php
echo $row['expense_name'];
?></td>
    <td class="w-100 px-0">
      <div class="progress progress-md mx-4">
        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php
echo doubleval(($row['todaysexpense']/$sum_today_expense)*100).'%';
?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </td>
    <td><h5 class="font-weight-bold mb-0"><?php
echo doubleval($row['todaysexpense']).' ₺';
?></h5></td>
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
                      <div class="carousel-item">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Gelir Kategoriler Ve Alt Kalemleri</p>
                            <?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select sum(income_amount)  as todaysincome from incomes where income_user_id='$userid'");
$result=mysqli_fetch_array($query);
$sum_today_income=$result['todaysincome'];
 ?> 
                              <h1 class="text-primary"><?php
echo doubleval($sum_today_income).' ₺';
?></h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Toplam Gelir tutarı</h3>
                              <p class="mb-2 mb-xl-0">Kazanılmış toplam gelir ve bu gelirin alt kalemleri.</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                  <?php
                                      //Today Expense
                                      $userid=$_SESSION['detsuid'];
                                      $tdate=date('Y-m-d');
                                      $query=mysqli_query($con,"select income_categories.income_category_name,sum(incomes.income_amount)  as todaysincome from incomes LEFT JOIN income_categories ON incomes.income_categories_id=income_categories.income_category_id where income_user_id='$userid' group by income_categories.income_category_name order by todaysincome desc");
                                      while ($row=mysqli_fetch_array($query)) { ?> 
                                      
                                      <tr>
                                         <td class="text-muted"><?php
                                      echo $row['income_category_name'];
                                      ?></td>
                                        <td class="w-100 px-0">
                                          <div class="progress progress-md mx-4">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: <?php
                                      echo doubleval(($row['todaysincome']/$sum_today_income)*100).'%';
                                      ?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </td>
                                        <td><h5 class="font-weight-bold mb-0"><?php
                                      echo doubleval($row['todaysincome']).' ₺';
                                      ?></h5></td>
                                      </tr>
                                      <?php 
                                      $cnt=$cnt+1;
                                      }
                                      ?>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                              <h3 class="font-weight-500 mb-xl-4 text-primary">En çok gelir sağlayanlar</h3>
                              <table class="table table-borderless report-table">
<?php
//Today Expense
$userid=$_SESSION['detsuid'];
$tdate=date('Y-m-d');
$query=mysqli_query($con,"select income_name,sum(income_amount) as todaysincome from incomes where income_user_id='$userid' group by incomes.income_name order by todaysincome DESC LIMIT 10");
while ($row=mysqli_fetch_array($query)) { ?> 

<tr>
    <td class="text-muted"><?php
echo $row['income_name'];
?></td>
    <td class="w-100 px-0">
      <div class="progress progress-md mx-4">
        <div class="progress-bar bg-primary" role="progressbar" style="width: <?php
echo doubleval(($row['todaysincome']/$sum_today_income)*100).'%';
?>" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </td>
    <td><h5 class="font-weight-bold mb-0"><?php
echo doubleval($row['todaysincome']).' ₺';
?></h5></td>
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
                    <a class="carousel-control-prev" href="#detailedReports" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#detailedReports" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php
                      include('rapor.php');
?>
                </div>
              </div>
            </div>
            <div class="col-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php
                      include('rapor2.php');
?>

                </div>
              </div>
            </div>
            </div>
            <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                <?php
                      include('rapor3.php');
?>
                </div>
              </div>
            </div>
            </div>
          <div class="row">
          <div class="col-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Haberler</h4>
                  <p class="card-description">
                    Ekonomide Öne Çıkanlar
                  </p>
<div style="font: normal 20px Arial; width: %100px; border: solid 1px #ccc; background: #fff; border-radius: 3px; box-shadow: 1px 1px 3px #ccc;">
    <iframe frameborder="0" width="1000px" height="500" src="https://www.trthaber.com/sitene-ekle/ekonomi-7/?haberSay=10&renk=a&resimler=1"></iframe>
    
</div>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Yapılacaklar Listesi</h4>
									<div class="list-wrapper pt-2">
										<ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                    <?php
                        $sql="SELECT * FROM todo where user_id='$userid' order by todo_date DESC";
                        $sorgu=mysqli_query($con,$sql);
                        while( $sonuc=mysqli_fetch_array($sorgu) ){
                                ?><li>
												<div class="form-check form-check-flat">
													<label class="form-check-label">
														<input class="checkbox" type="checkbox">
														<?php echo $sonuc["todo_name"]?><br><br>
                            <?php echo $sonuc["todo_date"]?>

													</label>
												</div>
                        <a class="remove" style="background-color: red;
  color: white;
  border: 2px solid white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;" href="index.php?delete=<?php echo $sonuc['id'];?>"></a>
											</li>                                
                                <?php
                        }
                        ?>
											
										</ul>
                  </div>
                  <form action="" method="post">
                  <div class="add-items d-flex mb-0 mt-2">
                  <input type="text" class="todo-list-input" placeholder="Yeni görev ekle" value="" name="todo" id="todo" required="true">

                  <label class="sr-only" for="date">Görev tarihi</label>
                      <div class="input-group mb-2 mr-sm-2">
                          <input class="form-control" type="date" value="" name="date" id="date" required="true">
                      </div>
                      <button type="submit" class="btn ti-plus btn-primary mb-2 " type="submit" value="submit" name="submit">Ekle</button>
									</div>
                </form>
								</div>
            </div>

            </div>
          </div>
          <br><br>
          
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