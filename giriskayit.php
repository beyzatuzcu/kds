<?php
$baglan=mysqli_connect("127.0.0.1","root","","kds");
$banka_ad=isset($_POST["Banka Adı:"]);
$y_no=isset($_POST["Yönetici No:"]);
$y_sifre=isset($_POST["Yönetici Şifre:"]);
mysqli_query($baglan,"INSERT INTO yoneticiler (banka_ad, y_no, y_sifre) VALUES ('".$banka_ad."','".$y_no."','".$y_sifre."')");

//HTML sayfamızdaki formdan verilerimizi çekiyoruz.
$banka_ad = $_POST["banka_ad"];
$y_no = $_POST["y_no"];
$y_sifre = $_POST["y_sifre"];
 
//Bir mysql sorgusu ile uyeler tablosuna verileri eklettiriyoruz.
$add = mysqli_query($baglan,"INSERT INTO yoneticiler (banka_ad, y_no, y_sifre) 
VALUES ('".$banka_ad."','".$y_no."','".$y_sifre."')");
//IF döngüsü ile ekleme işleminin gerçekleşip gerçekleşmediğini kontrol ediyoruz.
if ($add)
{
    echo "Giriş Başarılı Bir Şekilde Gerçekleştirildi";
}
else
{
    echo "Kullanıcı Bilgileri Hatalı. Böyle Bir Yönetici Bulunamadı";
}
 
?>