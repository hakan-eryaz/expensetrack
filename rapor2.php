<?php
//Today Expense
include('includes/dbconnection.php');

$tdate=date('Y-m-d');
$query2=mysqli_query($con,"select income_categories.income_category_name,sum(incomes.income_amount)  as todaysincome from incomes LEFT JOIN income_categories ON incomes.income_categories_id=income_categories.income_category_id where income_user_id='$userid' group by income_categories.income_category_name order by todaysincome desc");
?> 
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php  while ($row2=mysqli_fetch_array($query2)) { ?>
          ['<?php
echo $row2['income_category_name'];
?>',     <?php
echo $row2['todaysincome'];
?>],
          <?php }?>
        ]);

        var options = {
          title: 'Kategorilere göre kazanç tutarları',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data2, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d2" style="width: %100px; height: 500px;"></div>
  </body>
</html>