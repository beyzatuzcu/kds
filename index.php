<html>
    <head><link rel="stylesheet" type="text/css" href="anasayfa.css"></head>
    <title>Öneri</title>
    <div class="title">
        <br>
        <h1>
            <span style="color: #ff9f43">BAN</span>
            <span style="color: #0abde3">KER</span> <br>
            <span style="color: #ee5253">ATM<span>
            <span style="color: #5f27cd">Yeri<span>
            <span style="color: #27cd80">Önerme</span>
            <span style="color: #8878ad;">Formu</span>
      </h1>
      <br>
    </div>
    
        <h2>Lütfen ATM yeri önerileriniz için aşağıdaki formu doldurun</h2>
<body>
<div class="container">
<form action="  " method="POST">
    <div class="row">
        <fieldset>
            <legend>Kişisel Bilgiler : </legend>
            <input type="text" name="k_ad" placeholder="Adınız :" style="min-width:250px" value="<?=empty($_POST["k_ad"])?"":$_POST["k_ad"]?>">
            <br><br>
            <input type="text" name="k_soyad" placeholder="Soyadınız :" style="min-width:250px" value="<?=empty($_POST["k_soyad"])?"":$_POST["k_soyad"]?>">
            <br><br>
            <input type="text" name="k_email" placeholder="E Mail Adresiniz :" style="min-width:250px" value="<?=empty($_POST["k_email"])?"":$_POST["k_email"]?>">
            <br><br>
            
        </fieldset>
        <fieldset>
            <legend>ATM Özelliği: </legend>
            <input type="text" name="banka_ad" placeholder="Bankanızı Belirtiniz :" style="min-width:250px" value="<?=empty($_POST["banka_ad"])?"":$_POST["banka_ad"]?>">
            <br><br>
            
            <input type="text" name="b_ozellik" placeholder="ATM Özelliği :" style="min-width:250px" value="<?=empty($_POST["b_ozellik"])?"":$_POST["b_ozellik"]?>">
            <br><br>
            <input type="text" name="memnuniyet" placeholder="Bankamızdan Memnun Musunuz? E/H :" style="min-width:250px" value="<?=empty($_POST["memnuniyet"])?"":$_POST["memnuniyet"]?>">
            <br><br>
                       
						
        </fieldset>
        <fieldset>
            <legend>Adres :</legend>
            <div>
                <input type="text" name="bolge_ad" id="bolge" placeholder="Bolgenizi Yazın :"style="min-width:250px"value="<?=empty($_POST["bolge_ad"])?"":$_POST["bolge_ad"]?>">
                <br><br>     
                <input type="text" name="il_ad" id="il" placeholder="İlinizi Yazın :" style="min-width:250px"value="<?=empty($_POST["il_ad"])?"":$_POST["il_ad"]?>">
                <br><br>
                <input type="text" name="ilce_ad" id="ilce" placeholder="İlçenizi  Yazın :"  style="min-width:250px"value="<?=empty($_POST["ilce_ad"])?"":$_POST["ilce_ad"]?>">
                <br><br> 
                
            </div>
        </fieldset>
        
    
        <input type="submit" value="Gönder" name="gonder">
        </td>
        <?php
        if(isset($_POST['gonder']))
        ?>
</form>      
      
    </div>
</div>


<?php  error_reporting(0);
include ("giris_k.php"); ?>

</body>
<div>
   
    <h1>ATM Takip Sistemi</h1>  
    <a href="index.php" class="button">Öneri Formu</a>
    <a href="anasayfa.php" class="button">Anasayfa</a>
    <a href="giris.php" class="button">Yönetici Girişi</a>
  </div>
</html>

