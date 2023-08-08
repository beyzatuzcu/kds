<!Doctype html>
<html>
	<head>
	</head>
	<body>
		<form action="" method="POST" enctype="multipart/form-data">
       
		ATM Maliyeti : <input type="text" name="1metin" style="min-width:350px" placeholder="Güncel Fiyatı 25.000 Dolar "value="<?=(isset($_GET['sayi1']))?$_GET["sayi1"]:""?>"><br><br>
        Yıllık Bakım Ücreti : <input type="text" name="2metin"  style="min-width:350px" placeholder="Güncel Fiyatı 5.000-10.000 Dolar"value="<?=(isset($_GET['sayi2']))?$_GET["sayi2"]:""?>"><br><br>
        Kullanım Süresi : <input type="text" name="3metin" style="min-width:350px"  placeholder="Yıl Bazlı Hesaplama" value="<?=(isset($_GET['sayi3']))?$_GET["sayi3"]:""?>"><br><br>
		
		<input type="submit" value="Maliyet" name="gonder">
		</form>
		
		<?php
         if (isset($_GET['gonder']))
         {
         if ($_GET['gonder']== "Maliyet")
         echo "<hr> Toplam Maliyet (Dolar) = ".(($_GET['sayi1']+$_GET['sayi2'])*$_GET['sayi3']);
         }
        

         
			if(isset($_POST["gonder"]))
			{
				echo "ATM Maliyeti :".$_POST["1metin"]."<br>";
                echo " Yıllık Bakım Ücreti :".$_POST["2metin"]."<br>";
                echo "Kullanım Süresi :  ".$_POST["3metin"]."<br>";
			}
		?>
	</body>
</html>
