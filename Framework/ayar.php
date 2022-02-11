<?php

try{
    $link=mysqli_connect('localhost','root','');
    mysqli_select_db($link,'haker');
}
catch(Exception $ex){
//echo "Baglanti hatasi"
die();
}

if(isset($_POST["submit"]))
{

     $SiteAdi=$_POST['SiteAdi'];
     $SiteTitle=$_POST['SiteTitle'];
     $SiteDescription=$_POST['SiteDescription'];
     $SiteKeywords=$_POST['SiteKeywords'];
     $SiteCopyrightMetni=$_POST['SiteCopyrightMetni'];
     $SiteDescription=$_POST['SiteDescription'];
     $SiteLogosu=$_POST['SiteLogosu'];
     $SiteEmailAdresi=$_POST['SiteEmailAdresi'];
     $SiteEmailSifresi=$_POST['SiteEmailSifresi'];


     $insert=mysqli_query($link,"INSERT INTO students VALUES('$name','$password','$email')");

}

?>