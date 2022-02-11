<?php
$aramasorgusu = @mysql_real_escape_string($_GET['aramasorgusu']);
$sonucsorgu = @mysql_query("SELECT * FROM konular WHERE baslik LIKE '%".$aramasorgusu."%'" );
if(@mysql_num_rows($sonucsorgu)>0){
 while($sorguoku=@mysql_fetch_array($sonucsorgu)){
  echo $sorguoku['baslik'].'<br>';
 }
}
else{
 echo 'Aradığınız İçerik Bulunamadı';
}
?>