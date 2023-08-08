<?php
include("baglanti.php");
if($baglan){
    if($_POST){
        if($_POST["adi"]){
            $adi=$_POST["adi"];
        }else{
            echo "adi değişkeni gelmedi";
        }
        if($_POST["soyadi"]){
            $soyadi=$_POST["soyadi"];
        }else{
            echo "soyadi değişkeni gelmedi";   
        }
        if($_POST["hesap_no"]){
           $hesap_no=$_POST["hesap_no"];
        }else{
            echo "hesap_no değişkeni gelmedi";
        }
  $sorgu=mysqli_query($baglan,"INSERT INTO musteriler (adi, soyadi, hesap_no) 
VALUES ('".$adi."','".$soyadi."','".$hesap_no."')");


}else{
     echo "işlem gerçekleşti";
 
}
}
?>