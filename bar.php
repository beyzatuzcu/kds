<html>
  <head><link rel="stylesheet" type="text/css" href="stil.css"></head>
    <title>Ziraat Bankası</title>

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
  
      <?php
$db= new PDO("mysql:host=localhost;dbname=kds;charset=utf8","root","");

$query=$db->query("select * from iller");
    ?>
              </div>

<fieldset><legend>İl Bazlı Grafik Verileri</legend>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bölgeler','ATM Sayısı', 'İller'],
          ['Marmara Bölgesi', 710, 11],
          ['Ege Bölgesi', 452, 8],
          ['Akdeniz Bölgesi',362,  8],
          ['Karadeniz Bölgesi',442, 18],
          ['İç Anadolu Bölgesi',677,13],
          ['Doğu Anadolu Bölgesi',311, 15],
          ['GüneyDoğu Anadolu Bölgesi',185, 8]
        ]);

        var options = {
          chart: {
            title: 'Sayılarla ATM',
            subtitle: 'İl-İlçe-Bölge Bazlı Veriler',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

    </fieldset>