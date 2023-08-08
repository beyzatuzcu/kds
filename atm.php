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
<div><h1>Yönetici Profili </h1>  
    <a href="zprofil.php" class="button">Anasayfa</a> 
    <a href="zbilgi.php" class="button">Kullanıcı Grafikleri</a>
    <a href="harita.php" class="button">ATM Haritası</a>
    <a href="bar.php" class="button">İl Bazlı ATM Sayıları</a>
    <a href="atm.php" class="button">ATM Kar/Zarar</a>
    <a href="giris.php" class="button">Çıkış Yap</a>
</div>
<fieldset><legend>1 Günde Kullanım Sıklığı</legend>
    <div>
<h1>ATM Ortalama İşlem Adedi</h1>
<h1>ATM Ortalama İşlem Maliyeti</h1>
<center>
<html>
  <head>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(draw2Chart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['İşlem', 276]
        ]);
        var options = {
          width: 300, height: 320,
          redFrom: 0, redTo: 213,
          yellowFrom:213, yellowTo: 426,
          minorTicks: 8,
          max: 426
        };
        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      function draw2Chart() {

var data = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['Maliyet', 67]
]);
var options = {
  width: 300, height: 320,
  redFrom: 0, redTo: 90,
  yellowFrom:90, yellowTo: 179,
  minorTicks: 8,
  max: 179
};
var chart = new google.visualization.Gauge(document.getElementById('2_chart_div'));
chart.draw(data, options);
}
    </script>
  </head>
  <body>
  <table class="columns">
      <tr>
      <td><div id="chart_div" style="width: 300px; height: 300px;"></div></td>
    <td><div id="2_chart_div" style="width: 300px; height: 300px;"></div></td>
    </tr>
    </table> 
</body>
</html>
    </center>

    </div>
</fieldset>
<fieldset><legend>Ortalama İşlem Maliyeti= toplam maliyet/toplam işlem adedi</legend>
 









<div>
<center>
<div>
<br>
  <?php  
 
 $baglan=mysqli_connect("127.0.0.1","root","","kds");
 mysqli_set_charset($baglan, "utf8");
 
 mysqli_query($baglan,"INSERT INTO maliyet (toplam, islemadedi, ortalama, sayi1, sayi2, sayi3) 
 VALUES ");
 
 ?>
  
    <table border="2">
            <tr>
              
              <th>Toplam Maliyet</th>
              <th> Toplam İşlem Adedi</th>
              <th>Ortalama İşlem Maliyeti</th>
             
           </tr> </center>
            
     <?php       
               
                $z = mysqli_query($baglan,"Select sayi1,sayi2, sayi3, sayi1+(sayi2*sayi3) as toplam from maliyet");
                $zz =  mysqli_query($baglan,"SELECT  FLOOR(Rand() * 500) + 0 AS islemadedi FROM maliyet");
               
                while ($s=mysqli_fetch_array($z)){
                    $toplam= $s['toplam'];
                    
                    while ($s=mysqli_fetch_array($zz)){
                        $islemadedi= $s['islemadedi'];
                      
                        while ($s=mysqli_fetch_array($zz)){
                            $ortalama =round(("$toplam"/"$islemadedi")*365);
                    echo "<tr>
                    <td>$toplam</td>
                    <td>$islemadedi</td>
                    <td>$ortalama</td>
                </tr>";
                        if($toplam>=$ortalama){
                          echo "Vasıfsız atm. Kaldır.";
                        }   
                        else{
                          echo "Kullanıma devam.";
                        }
                } } }
        ?>
      </table> 
      <a href="atm.php" class="button">Güncelle</a>
</div>
  
 <div >
   <br><br>
     Toplam Maliyet Değeri Ortalama İşlem Maliyetinden Yüksek ise O ATM'nin kaldırılması veya 
     <br>  Toplam Maliyet Değeri Ortalama İşlem Maliyetinden Düşük ise o ATM'nin kalması gerektiğini dile getiren tablolar.
            </div>
</div>
</fieldset>