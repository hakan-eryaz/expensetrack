<?php

include 'db.php';
if(isset($_POST["hesapadi"])){
	$hesapadi		=	$_POST["hesapadi"];
}else{
	$hesapadi		=	"";
}
if(isset($_POST["açılışbakiye"])){
	$açılışbakiye				=	$_POST["açılışbakiye"];
}else{
	$açılışbakiye				=	"";
}
if(isset($_POST["hesaplimit"])){
	$hesaplimit		=	$_POST["hesaplimit"];
}else{
	$hesaplimit		=	"";
}
if(isset($_POST["kart4hanesi"])){
	$kart4hanesi		=	$_POST["kart4hanesi"];
}else{
	$kart4hanesi		=	"";
}

if(($hesapadi!="") and ($açılışbakiye!="") and ($hesaplimit!="")and ($kart4hanesi!="")){
	

	$insert=mysqli_query($link, "INSERT INTO hesaplar(kullanıcıid,hesapadi,hesaplimit,hesapbakiye,kartson4hanesi) 
	VALUES (1,'$hesapadi', '$hesaplimit','$açılışbakiye','$kart4hanesi')");
	header("Location:login.php");
}				 
else{
header("Location:error-404.php");
}
?>