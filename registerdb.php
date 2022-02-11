<?php

include 'db.php';
if(isset($_POST["username"])){
	$username		=	$_POST["username"];
}else{
	$username		=	"";
}
if(isset($_POST["email"])){
	$email				=	$_POST["email"];
}else{
	$email				=	"";
}
if(isset($_POST["password"])){
	$password		=	$_POST["password"];
}else{
	$GelenSifreTekrar		=	"";
}


if(($username!="") and ($email!="") and ($password!="")){
	

				$insert=mysqli_query($link, "INSERT INTO kullanıcılar(kullanıcıadi,mail,şifre) 
				VALUES ('$username', '$email','$password')");
				header("Location:login.php");
}				 
else{
  header("Location:error-404.php");
}
?>