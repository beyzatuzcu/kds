<html>
<meta charset="UTF-8">
  <head><link rel="stylesheet" type="text/css" href="anasayfa.css"></head>
  <title>Yönetici Girişi</title>
  <div class="title">
    <br>
    <h1>
      <span style="color: #ff9f43">BAN</span>
      <span style="color: #0abde3">KER</span> <br>
      <span style="color: #ee5253">ATM<span>
      <span style="color: #5f27cd">Takip<span>
      <span style="color: #27cd80">Sistemi</span>
    </h1>
    <br>
  </div>
  <div class="main">
  <p><form action="zprofil.php" method="POST">
                <h1>Yönetici Giriş Paneli</h1><br><br>
                Banka Adı :<br>
                <input type="text" name="banka_ad" style="min-width:350px">
                <br><br>                    
                Yönetici Giriş Numarası :<br>
                <input type="text" name="y_no"  style="min-width:350px">
                <br><br>
                Yönetici Giriş Şifresi :<br> 
                <input type="password" name="y_sifre"  style="min-width:350px">
                <br><br>
                <input type="submit" value="giris" name="giris">
              </form>
              </p>
</div>

<?php  error_reporting(0);
include ("giris_baglan.php"); ?>

  <fieldset>
    
      <h1>Yönetici Girişi</h1>  
      <a href="index.php" class="button">Öneri Formu</a>
      <a href="anasayfa.php" class="button">Anasayfa</a>
      <a href="giris.php" class="button">Yönetici Girişi</a>

  </fieldset>
</html>