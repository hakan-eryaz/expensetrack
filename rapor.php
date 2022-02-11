<?php
//Today Expense
include('includes/dbconnection.php');

$tdate=date('Y-m-d');
$query=mysqli_query($con,"select expense_categories.expense_category_name,sum(expenses.expense_amount)  as todaysexpense from expenses LEFT JOIN expense_categories ON expenses.expense_categories_id=expense_categories.expense_category_id where expense_user_id='$userid' group by expense_categories.expense_category_name order by todaysexpense DESC");
?> 
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php  while ($row=mysqli_fetch_array($query)) { ?>
          ['<?php
echo $row['expense_category_name'];
?>',     <?php
echo $row['todaysexpense'];
?>],
          <?php }?>
        ]);

        var options = {
          title: 'Kategorilere göre harcanan tutarlar',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: %100px; height: 500px;"></div>
  </body>
</html>