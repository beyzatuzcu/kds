<html>
    <head>
    </head>
    <body>
        <form action="kayit.php" method="POST">
            Kullanıcı Adı : <input type="text" name="ad" /> <br />
            Kullanıcı SoyAdı : <input type="text" name="soyad" /> <br />
            hesap no: <input type="text" name="hesap_no" /> <br />
            <input type="submit" Value="Kaydet" />
        </form>
    </body>
</html>
<?php
$baglan=mysqli_connect("127.0.0.1","root","","deneme");

$ad=isset($_POST["Ad:"]);
$soyad=isset($_POST["Soyad:"]);
$hesap_no=isset($_POST["Hesap No:"]);


mysqli_query($baglan,"INSERT INTO musteriler (ad, soyad, hesap_no) VALUES ('".$ad."','".$soyad."','".$hesap_no."')");

?>

<table border="2">
    <tr>
        <td>Üye Adı</td>
        <td>Üye SoyAdı</td>
        <td>Üye Parolası</td>
    </tr>
<?php

$adi = $_POST["ad"];
$soyadi = $_POST["soyad"];
$hesap_no = $_POST["hesap_no"];

$add = mysqli_query($baglan,"INSERT INTO musteriler (ad, soyad, hesap_no) 
VALUES ('".$adi."','".$soyadi."','".$hesap_no."')");

if ($add)
{
    echo "Ekleme İşlemi Başarılı Bir Şekilde Gerçekleştirildi";
}
else
{
    echo "Hata";
}
                 
                $v = mysqli_query($baglan,"select * from musteriler");
                while ($b=mysqli_fetch_array($v)){
                     
                    $ad = $b['ad'];
                    $soyad = $b['soyad'];
                    $hesap_no = $b['hesap_no'];
                    echo "<tr>
                    <td>$ad</td>
                    <td>$soyad</td>
                    <td>$hesap_no</td>
                    </tr>";
                     
                }
                 
   ?>
                 
</table>