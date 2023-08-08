<?php
$baglan=mysqli_connect("127.0.0.1","root","","kds");
$banka_ad=isset($_POST["banka_ad"]);
$y_no=isset($_POST["y_no"]);
$y_sifre=isset($_POST["y_sifre"]);
mysqli_query($baglan,"INSERT INTO  yoneticiler (banka_ad, y_no, y_sifre) 
VALUES ('".$banka_ad."','".$y_no."','".$y_sifre."')");
?>