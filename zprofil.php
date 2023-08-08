<?php   error_reporting(0); 
$baglan=mysqli_connect("127.0.0.1","root","","kds");
mysqli_set_charset($baglan, "utf8");
$banka_ad=isset($_POST["banka_ad"]);
$y_no=isset($_POST["y_no"]);
$y_sifre=isset($_POST["y_sifre"]);
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
    echo " Hoşgeldin 
    $banka_ad Yöneticisi  $y_no " ;
}
else
{
    echo "$banka_ad   $y_no  ";
}
?>
<html>
  <head><link rel="stylesheet" type="text/css" href="stil.css"></head>
    <title>Ziraat Bankası</title>

<style>
* {
  box-sizing:border-box;
}

.left {
  float:left;
  width:33%; 
}

.main {
  float:left;
  width:33%; 
}

.right {
  float:left;
  width:33%; 
}

.left2 {
  float:left;
  width:33%; 
}

.main2 {
  float:left;
  width:33%; 
}

.right2{
  float:left;
  width:33%; 
}

@media screen and (max-width:800px) {
  .left, .main, .right {
    width:100%; 
  }
  .left2, .main2, .right2 {
    width:100%; 
  }
}
</style>
<div class="title">
  <br>
  <h1><span style="color: #ff9f43">BAN</span>
    <span style="color: #0abde3">KER</span> <br>
    <span style="color: #ee5253">ATM<span>
    <span style="color: #5f27cd">Takip<span>
    <span style="color: #27cd80">Sistemi</span>
  </h1><br>
</div>
<div>
<h1>Yönetici Profili </h1>  
<a href="zprofil.php" class="button">Anasayfa</a> 
    <a href="zbilgi.php" class="button">Kullanıcı Grafikleri</a>
    <a href="harita.php" class="button">ATM Haritası</a>
    <a href="bar.php" class="button">İl Bazlı ATM Sayıları</a>
    <a href="atm.php" class="button">ATM Kar/Zarar</a>
    <a href="giris.php" class="button">Çıkış Yap</a>
    </div>
<fieldset><legend>Ziraat Bankası Yönetici Bilgilendirme</legend>
<div>
  <div class="left">
  <center><img src="görseller/ziraatlogo.jpg" alt="ZiraatBankası" height="100px" width="200px" >
                <h2> Türkiye Cumhuriyeti Ziraat Bankası A.Ş.</h2>
                <h1>Yurtiçi Şube Sayısı: 1742 Yurtdışı Şube Sayısı : 24</h1>
                <h1> Toplam ATM Sayısı : 7264</h1><br><br><br>
                    <br></center></div>
                   

<div class="main">
  <br>
  <br>
  <br>
  <?php
    $baglan=mysqli_connect("127.0.0.1","root","","kds");
    mysqli_set_charset($baglan, "utf8");
    $b_ozellik=isset($_POST["b_ozellik"]);
    $o_id=isset($_POST["o_id"]);
    mysqli_query($baglan,"INSERT INTO b_ozellik ( b_ozellik, o_id)
    VALUES ('".$b_ozellik."','".$o_id."')");
    $o_id = $_POST['o_id'];
    $b_ozellik= $_POST['b_ozellik'];
    $sql="select * from b_ozellik WHERE (o_id='$o_id' and b_ozellik='$b_ozellik')";
    $sonuc= mysqli_query($baglan,$sql);
    $satirsay=mysqli_num_rows($sonuc);
    if ($satirsay>0)
    { 
    echo "Bu özellikte ATM daha önce kaydedilmiş"; 
    } else{
      $sqlekle="INSERT INTO b_ozellik( o_id, b_ozellik) 
      VALUES ('$o_id','$b_ozellik')";
      $sonuc=mysqli_query($baglan,$sqlekle);
      if ($sonuc==0)
      echo "Eklenemedi, kontrol ediniz";
      else
      echo "Başarıyla eklendi";
    };
  ?>
  <form method="POST" action=" ">
    <table border="1" align="center">
      <tr>
        <td colspan="2" align="center"> ATM Ekleme</td>
      </tr>
      <tr>
        <td>ATM No</td>
        <td><input type="text" name="o_id"></td>
      </tr>
      <tr>
        <td>ATM Özelliği</td>
        <td><input type="text" name="b_ozellik"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" name="sonuc" value="Kaydet"></td>
      </tr>
    </table>
  </form>
</div>  


<div class="right">
<br>
  <br>
  <br>
<center>
<table border="1" align="center">
            <tr>
              <th>ATM Özellik Numarası</th>
              <th> ATM Özellik Türü </th>
            </tr>   
     <?php       
                $b = mysqli_query($baglan,"select * from b_ozellik");          
                while ($bb=mysqli_fetch_array($b)){                    
                    $o_id = $bb['o_id'];
                    $b_ozellik = $bb['b_ozellik'];                                       
                    echo "<tr>
                    <td>$o_id</td>
                    <td>$b_ozellik</td>                   
                </tr>";           
                }
        ?>
      </table> 

                  </div>

</div>
              </fieldset>
<br>

<div><fieldset><legend>Maliyet Hesaplayıcısı (Tablo/Grafik)</legend>
<div class="left2">
  <p><form action="" method="POST">
                <h1>ATM Maliyet Hesaplama</h1><br><br>
                ATM Maliyeti :
                <input type="text" name="sayi1" placeholder="Güncel Fiyatı 25.000 Dolar " style="min-width:350px"value="<?=(isset($_GET['sayi1']))?$_GET["sayi1"]:""?>">
                <br><br>                    
                Yıllık Bakım Ücreti :
                <input type="text" name="sayi2" placeholder="Güncel Fiyatı 5.000-10.000 Dolar" style="min-width:350px"value="<?=(isset($_GET['sayi2']))?$_GET["sayi2"]:""?>">
                <br><br>
                Kullanım Süresi : 
                <input type="text" name="sayi3" placeholder="Yıl Bazlı Hesaplama" style="min-width:350px" value="<?=(isset($_GET['sayi3']))?$_GET["sayi3"]:""?>">
                <br><br>
                <input type="submit" value="Maliyet" name="gonder">
              </form>
              <?php
              if (isset($_GET['gonder']))
              
              ?>
              </p>
            
</div>

<div class="main2">
<br><br><br>
  <?php 
  include ("baglanti.php"); 
  ?>
  <center>
    <table border="2">
            <tr>
              <th>ATM Maliyeti</th>
              <th> Yıllık Bakım Ücreti</th>
              <th>Kullanım Süresi</th>
              <th>Toplam Maliyet</th>
            </tr>
            </center>
     <?php       
                $z = mysqli_query($baglan,"Select sayi1,sayi2,sayi3, sayi1+(sayi2*sayi3) as toplam from maliyet");
               
                while ($s=mysqli_fetch_array($z)){
                     
                    $sayi1 = $s['sayi1'];
                    $sayi2 = $s['sayi2'];
                    $sayi3 = $s['sayi3'];
                    $toplam= $s['toplam'];
                   
                    echo "<tr>
                    <td>$sayi1</td>
                    <td>$sayi2</td>
                    <td>$sayi3</td>
                    <td>$toplam</td>
                </tr>";           
                }
        ?>
      </table> 

      
                
</div>
<div class="right2">
  <?php
  $db= new PDO("mysql:host=localhost;dbname=kds;charset=utf8","root","");
  $query=$db->query("Select sayi1,sayi2,sayi3, sayi1+(sayi2*sayi3) as toplam from maliyet");
  $sql = "Select sayi1,sayi2,sayi3, sayi1+(sayi2*sayi3) as toplam from maliyet";

  ?>
  <html>
  <head><meta charset="UTF-8">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
         
         <?php
         foreach($query as $row){
           echo "['".$row["sayi3"]."',".$row["toplam"]."],";
         }
         ?>
          
        ]);

        // Set chart options
        var options = {'title':'Yıllara Göre Toplam Maliyet Grafiği',
                       'width':400,
                       'height':450};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
  </html>
</div>
</div>
    </fieldset>






 
