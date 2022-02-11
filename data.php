<?php

//data.php
header('Content-Type: application/json');
include('includes/dbconnection.php');
session_start();
$userid=$_SESSION['detsuid'];



        $result=mysqli_query($con,"select expense_categories.expense_category_name,sum(expenses.expense_amount)  as todaysexpense from expenses LEFT JOIN expense_categories ON expenses.expense_categories_id=expense_categories.expense_category_id where expense_user_id='$userid' group by expense_categories.expense_category_name");

		$data = array();

		foreach($result as $row)
		{
			$data[] = array(
				'expense_category_name'		=>	$row["expense_category_name"],
				'todaysexpense'			=>	$row["todaysexpense"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
        echo "<pre>";
		echo json_encode($data,JSON_PRETTY_PRINT);
        echo "</pre>";

?>