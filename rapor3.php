<?php
//Today Expense
include('includes/dbconnection.php');

$tdate=date('Y-m-d');
$query3=mysqli_query($con,"select debt_loan.debt_loan_id,debt_loan.debt_loan_name,debt_loan.debt_loan_amount,debt_loan.debt_loan_date,debt_loan.debt_loan_note,debt_loan_categories.debt_loan_category_name from debt_loan LEFT JOIN debt_loan_categories ON debt_loan.debt_loan_categories_id=debt_loan_categories.debt_loan_categories_id where debt_loan_user_id='$userid' order by debt_loan_date");
?> 
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data3 = google.visualization.arrayToDataTable([
          ['Borç Vade Tarihi', 'Borç Miktarı'],
          <?php  while ($row3=mysqli_fetch_array($query3)) { ?>
          ['<?php
echo $row3['debt_loan_date'];
?>',     <?php
echo $row3['debt_loan_amount'];
?>],
          <?php }?>
        ]);

        var options = {
          title: 'Borçlar',
          curveType: 'function',
          legend: { position: 'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('piechart_3d3'));
        chart.draw(data3, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d3" style="width: %100px; height: 500px;"></div>
  </body>
</html>