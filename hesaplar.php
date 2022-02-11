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
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hesaplar</h4>
                  <p class="card-description">
                    Kayıtlı hesaplarınız
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Hesap Adı
                          </th>
                          
                          <th>
                            Hesap Limit
                          </th>
                          <th>
                            Bakiye
                          </th>
                          <th>
                            Hesap Gelir
                          </th>
                          <th>
                            Hesap Borç
                          </th>
                          <th>
                            Kart Son 4 Hanesi
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php include 'db.php';
                        $sql="SELECT * FROM hesaplar";
                        $sorgu=mysqli_query($link,$sql);
                        while( $sonuc=mysqli_fetch_row($sorgu) ){
                                ?>
                                <tr>
                          <td class="py-1">
                            <?php echo $sonuc[2]; ?>
                          </td>
                          
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($sonuc[4]/$sonuc[3])*100 ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                          <?php echo $sonuc[4]; ?>
                          </td>
                          <td>
                          <?php echo $sonuc[5]; ?>
                          </td>
                          <td>
                          <?php echo $sonuc[6]; ?>
                          </td>
                          <td>
                          <?php echo $sonuc[7]; ?>
                          </td>
                        </tr>

                                <?php
                          
                        }
                        ?>




                        
                        




                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Hesap Ekle</h4>
                  <p class="card-description">
                    Hesap eklemek için aşağıdaki bilgileri doldurunuz.
                  </p>
                  <form class="form-inline" action="hesapekle.php" method="post">
                    <label class="sr-only" for="inlineFormInputName2">Hesap Adı</label>
                    <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Hesap Adı" name="hesapadi">
                  
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Açılış Bakiyesi</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">₺</div>
                      </div>
                      <input type="number" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Açılış Bakiyesi" name="açılışbakiye">
                    </div>
                    <label class="sr-only" for="inlineFormInputGroupUsername2">Hesap Limiti</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">₺</div>
                      </div>
                      <input type="number" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Hesap Limiti" name="hesaplimit">
                    </div>
                    <label class="sr-only" for="inlineFormInputName2">Kart Son 4 Hanesi</label>
                    <input type="number" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Kart Son 4 Hanesi" name="kart4hanesi">
                    <button type="submit" class="btn ti-plus btn-primary mb-2 " type="submit"> Ekle</button>
                  </form>
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
