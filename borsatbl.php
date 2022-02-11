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
            <?php
            $yesterday = new DateTime('yesterday');
            $format=$yesterday->format('Ym/dmY');
            
            $connect_web = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
            $connect_web2 = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'.$format.'.xml');
            $JSON = json_decode(file_get_contents('https://api.genelpara.com/embed/borsa.json'), true);
            $JSON2 = json_decode(file_get_contents('https://api.genelpara.com/embed/kripto.json'), true);
            $JSON3 = json_decode(file_get_contents('https://api.genelpara.com/embed/altin.json'), true);
            
?>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card" style="background-color:#17EBBD";>
                <div class="card-body">
                  <h4 class="card-title">Serbest Piyasa Döviz Kurları</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kur</th>
                          <th>Alış</th>
                          <th>Satış</th>
                          <th>Değişim</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        <?php
                          $i=0;
                          while($i<20){
                            ?>
                            <tr>
                          <td><?php
                          echo $connect_web->Currency[$i]->Isim;
                          ?>
                          </td>
                          <td><?php
                          echo $connect_web->Currency[$i]->ForexBuying;
                          ?>
                          </td>
                          <td><?php
                          echo $connect_web->Currency[$i]->ForexSelling;
                          ?> 
                          </td>
                          <td><?php
                          echo ('%'.intval(($connect_web->Currency[$i]->ForexSelling)-($connect_web2->Currency[$i]->ForexSelling))/100);
                          ?></td>
                        </tr>
                        
                        <?php
                         $i=$i+1;
                          }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card" style="background-color:#00DBDB";>
                <div class="card-body">
                  <h4 class="card-title">Borsa Hisse Senetleri</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Hisse</th>
                          <th>Alış</th>
                          <th>Satış</th>
                          <th>Değişim</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>THYAO-Türk Hava Yolları</td>
                          <td><?php echo $JSON['THYAO']['alis']; ?></td>
                          <td> <?php echo $JSON['THYAO']['satis']; ?></td>
                          <td><?php echo '%'.$JSON['THYAO']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>GARAN - GARANTİ BANKASI</td>
                          <td><?php echo $JSON['GARAN']['alis']; ?></td>
                          <td> <?php echo $JSON['GARAN']['satis']; ?></td>
                          <td><?php echo '%'.$JSON['GARAN']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>KOZAL - KOZA ALTIN</td>
                        <td><?php echo $JSON['KOZAL']['alis']; ?></td>
                        <td> <?php echo $JSON['KOZAL']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['KOZAL']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>SISE - ŞİŞE CAM</td>
                        <td><?php echo $JSON['SISE']['alis']; ?></td>
                        <td> <?php echo $JSON['SISE']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['SISE']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>EREGL - EREĞLİ DEMİR CELİK</td>
                        <td><?php echo $JSON['EREGL']['alis']; ?></td>
                        <td> <?php echo $JSON['EREGL']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['EREGL']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>YKBNK - YAPI VE KREDİ BANK.</td>
                        <td><?php echo $JSON['YKBNK']['alis']; ?></td>
                        <td> <?php echo $JSON['YKBNK']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['YKBNK']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>AKBNK - AKBANK</td>
                        <td><?php echo $JSON['AKBNK']['alis']; ?></td>
                        <td> <?php echo $JSON['AKBNK']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['AKBNK']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>PETKM - PETKİM</td>
                        <td><?php echo $JSON['PETKM']['alis']; ?></td>
                        <td> <?php echo $JSON['PETKM']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['PETKM']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>ASELS - ASELSAN</td>
                        <td><?php echo $JSON['ASELS']['alis']; ?></td>
                        <td> <?php echo $JSON['ASELS']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['ASELS']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>SAHOL - SABANCI HOLDİNG</td>
                        <td><?php echo $JSON['SAHOL']['alis']; ?></td>
                        <td> <?php echo $JSON['SAHOL']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['SAHOL']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>SAHOL - SABANCI HOLDİNG</td>
                        <td><?php echo $JSON['SAHOL']['alis']; ?></td>
                        <td> <?php echo $JSON['SAHOL']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['SAHOL']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>PGSUS - PEGASUS</td>
                        <td><?php echo $JSON['PGSUS']['alis']; ?></td>
                        <td> <?php echo $JSON['PGSUS']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['PGSUS']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>TUPRS - TÜPRAŞ</td>
                        <td><?php echo $JSON['TUPRS']['alis']; ?></td>
                        <td> <?php echo $JSON['TUPRS']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['TUPRS']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>FROTO - FORD OTOSAN</td>
                        <td><?php echo $JSON['FROTO']['alis']; ?></td>
                        <td> <?php echo $JSON['FROTO']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['FROTO']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>EKGYO - EMLAK KONUT GMYO</td>
                        <td><?php echo $JSON['EKGYO']['alis']; ?></td>
                        <td> <?php echo $JSON['EKGYO']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['EKGYO']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>KARSN - KARSAN OTOMOTİV</td>
                        <td><?php echo $JSON['KARSN']['alis']; ?></td>
                        <td> <?php echo $JSON['KARSN']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['KARSN']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>BIMAS - BİM MAĞAZALAR</td>
                        <td><?php echo $JSON['BIMAS']['alis']; ?></td>
                        <td> <?php echo $JSON['BIMAS']['satis']; ?></td>
                        <td><?php echo '%'.$JSON['BIMAS']['degisim']; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card" style="background-color:#18F5DD";>
                <div class="card-body">
                  <h4 class="card-title">Kripto Paralar</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Kripto Para</th>
                          <th>Alış</th>
                          <th>Satış</th>
                          <th>Değişim</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <tr>
                        <td>BTC - Bitcoin</td>
                        <td><?php echo $JSON2['BTC']['alis']; ?></td>
                        <td> <?php echo $JSON2['BTC']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['BTC']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>ETH - Ethereum</td>
                        <td><?php echo $JSON2['ETH']['alis']; ?></td>
                        <td> <?php echo $JSON2['ETH']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['ETH']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>BNB - Binance Coin</td>
                        <td><?php echo $JSON2['BNB']['alis']; ?></td>
                        <td> <?php echo $JSON2['BNB']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['BNB']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>SHIB - Shiba Inu</td>
                        <td><?php echo $JSON2['SHIB']['alis']; ?></td>
                        <td> <?php echo $JSON2['SHIB']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['SHIB']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>XRP - Ripple</td>
                        <td><?php echo $JSON2['XRP']['alis']; ?></td>
                        <td> <?php echo $JSON2['XRP']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['XRP']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>DOGE - Dogecoin</td>
                        <td><?php echo $JSON2['DOGE']['alis']; ?></td>
                        <td> <?php echo $JSON2['DOGE']['satis']; ?></td>
                        <td><?php echo '%'.$JSON2['DOGE']['degisim']; ?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card"  style="background-color: #07DDF5";>
                <div class="card-body">
                  <h4 class="card-title">Altın</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Altın</th>
                          <th>Alış</th>
                          <th>Satış</th>
                          <th>Değişim</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <tr>
                        <td>Ons Altın</td>
                        <td><?php echo $JSON3['XAU/USD']['alis']; ?></td>
                        <td> <?php echo $JSON3['XAU/USD']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['XAU/USD']['degisim']; ?></td>
                        </tr>
                        <td>Gram Altın</td>
                        <td><?php echo $JSON3['GA']['alis']; ?></td>
                        <td> <?php echo $JSON3['GA']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['GA']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>Çeyrek Altın</td>
                        <td><?php echo $JSON3['C']['alis']; ?></td>
                        <td> <?php echo $JSON3['C']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['C']['degisim']; ?></td>
                        </tr>
                        
                        <tr>
                        <td>Yarım Altın</td>
                        <td><?php echo $JSON3['Y']['alis']; ?></td>
                        <td> <?php echo $JSON3['Y']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['Y']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>Tam Altın</td>
                        <td><?php echo $JSON3['T']['alis']; ?></td>
                        <td> <?php echo $JSON3['T']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['T']['degisim']; ?></td>
                        </tr>
                        <tr>
                        <td>Cumhuriyet Altını</td>
                        <td><?php echo $JSON3['CMR']['alis']; ?></td>
                        <td> <?php echo $JSON3['CMR']['satis']; ?></td>
                        <td><?php echo '%'.$JSON3['CMR']['degisim']; ?></td>
                        </tr>
                        
                        
                      </tbody>
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
