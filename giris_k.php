<?php $baglan=mysqli_connect("127.0.0.1","root","","kds"); mysqli_set_charset($baglan, "utf8");

$k_id=isset($_POST["k_id"]); $o_id=isset($_POST["o_id"]);
$b_id=isset($_POST["b_id"]); $k_ad=isset($_POST["k_ad"]);
$k_soyad=isset($_POST["k_soyad"]); $k_email=isset($_POST["k_email"]);
$banka_ad=isset($_POST["banka_ad"]);  $b_ozellik=isset($_POST["b_ozellik"]);
$memnuniyet=isset($_POST["memnuniyet"]); $bolge_ad=isset($_POST["bolge_ad"]);
$il_ad=isset($_POST["il_ad"]);$ilce_ad=isset($_POST["ilce_ad"]);

mysqli_query($baglan,"INSERT INTO kullanicilar (k_id, o_id, b_id, b_ozellik, banka_ad, k_ad, k_soyad, k_email, memnuniyet, bolge_ad, il_ad, ilce_ad)
VALUES (NULL, NULL, NULL,'".$_POST["k_ad"]."','".$_POST["k_soyad"]."','".$_POST["k_email"]."',
'".$_POST["k_id"]."','".$_POST["o_id"]."','".$_POST["b_id"]."','".$_POST["bolge_ad"]."','".$_POST["il_ad"]."','".$_POST["ilce_ad"]."''".$_POST["banka_ad"]."','".$_POST["b_ozellik"]."','".$_POST["memnuniyet"]."')"); ?>