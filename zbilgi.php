<html>
<meta charset="UTF-8">
<head><link rel="stylesheet" type="text/css" href="stil.css"></head>
<title>Ziraat Bankası</title>
  <style>
    * {
      box-sizing:border-box;
    }
    .left {  
      float:left;
      width:50%; 
    }


    .main {
      float:left;
      width:50%; 
    }
    /* Use a media query to add a break point at 800px: */
    @media screen and (max-width:800px) {
      .left, .main, .right {
        width:100%; /* The width is 100%, when the viewport is 800px or smaller */
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
 
<div><fieldset><legend>Kullanıcı ATM İstek Grafiği</legend><center>
  
  <div>  
    <div class="left">
    <?php
      $db= new PDO("mysql:host=localhost;dbname=kds;charset=utf8","root","");

      $query=$db->query("SELECT kullanicilar.b_ozellik, COUNT(kullanicilar.o_id) AS kullanici_istek_sayisi
      FROM kullanicilar
      GROUP BY kullanicilar.o_id
      ORDER BY kullanici_istek_sayisi");
    ?>
    <?php include ("baglanti_zkullanici.php"); ?>
    <br><br><br><br><br><br>
    <table border="2">
      <tr>
       <th> ATM özelliği</th>
       <th>Kullanıcı istek Sayısı</th>
     </tr>
      <?php
        $k = mysqli_query($baglan,"SELECT kullanicilar.b_ozellik, COUNT(kullanicilar.o_id) AS kullanici_istek_sayisi
        FROM kullanicilar
        GROUP BY kullanicilar.o_id
        ORDER BY kullanici_istek_sayisi");              
        while ($kk=mysqli_fetch_array($k)){ 
            $b_ozellik = $kk['b_ozellik'];
            $kullanici_istek_sayisi= isset($kk['kullanici_istek_sayisi']) ? $kk['kullanici_istek_sayisi'] : '';
            echo "<tr>
            <td>$b_ozellik</td>
            <td>$kullanici_istek_sayisi</td>
            </tr>";       
          } 
      ?>
    </table>

        </div>
        <div class="main">
    <html>
      <head><meta charset="UTF-8">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
              <?php
                foreach($query as $row){
                  echo "['".$row["b_ozellik"]."',".$row["kullanici_istek_sayisi"]."],";
                }
              ?>
            ]);
            var options = {'title':'İstek Grafiği',
                          'width':400,
                          'height':400};
            var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
            chart.draw(data, options);
          }
        </script>
      </head>
      <body><div id="chart_div"></div></body>
    </html>
        </div>
  </div></center></fieldset>
</div>


<div><fieldset><legend>Kullanıcı Grafiği</legend><center>
<?php
      $db= new PDO("mysql:host=localhost;dbname=kds;charset=utf8","root","");

      $query=$db->query("SELECT kullanicilar.banka_ad, COUNT(kullanicilar.b_id) AS ziraat_bankasi
      FROM kullanicilar
      GROUP BY kullanicilar.b_id
      ORDER BY ziraat_bankasi");

      $query2=$db->query("SELECT kullanicilar.memnuniyet, COUNT(kullanicilar.k_id) AS kullanici_memnuniyet_sayisi
      FROM kullanicilar
      GROUP BY kullanicilar.memnuniyet
      ORDER BY kullanici_memnuniyet_sayisi");
    ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawSarahChart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(drawAnthonyChart);

      // Callback that draws the pie chart for Sarah's pizza.
      function drawSarahChart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
                foreach($query as $rw){
                  echo "['".$rw["banka_ad"]."',".$rw["ziraat_bankasi"]."],";
                }
              ?>
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Ziraat Bankası Kullanıcı Sayısı',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
        chart.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function drawAnthonyChart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
                foreach($query2 as $rw){
                  echo "['".$rw["memnuniyet"]."',".$rw["kullanici_memnuniyet_sayisi"]."],";
                }
              ?>
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Memnuniyet Grafiği',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="Sarah_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="Anthony_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>

<div><fieldset><legend>Kullanıcı Bölge Grafiği</legend><center>
<?php
      $db= new PDO("mysql:host=localhost;dbname=kds;charset=utf8","root","");

      $query=$db->query("SELECT kullanicilar.bolge_ad, COUNT(kullanicilar.k_id) AS ziraat_bankasi
      FROM kullanicilar
      GROUP BY kullanicilar.bolge_ad
      ORDER BY ziraat_bankasi");

      $query2=$db->query("SELECT kullanicilar.il_ad, COUNT(kullanicilar.k_id) AS kullanici_memnuniyet_sayisi
      FROM kullanicilar
      GROUP BY kullanicilar.il_ad
      ORDER BY kullanici_memnuniyet_sayisi");

      $query3=$db->query("SELECT kullanicilar.ilce_ad, COUNT(kullanicilar.k_id) AS kullanici_memnuniyet
      FROM kullanicilar
      GROUP BY kullanicilar.ilCE_ad
      ORDER BY kullanici_memnuniyet");
    ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load Charts and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Draw the pie chart for Sarah's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(draw1Chart);

      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(draw2Chart);
      // Draw the pie chart for the Anthony's pizza when Charts is loaded.
      google.charts.setOnLoadCallback(draw3Chart);

      // Callback that draws the pie chart for Sarah's pizza.
      function draw1Chart() {

        // Create the data table for Sarah's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
                foreach($query as $rw){
                  echo "['".$rw["bolge_ad"]."',".$rw["ziraat_bankasi"]."],";
                }
              ?>
        ]);

        // Set options for Sarah's pie chart.
        var options = {title:'Ziraat Bankası Bölge Bazlı İstek Kullanıcı Grafiği',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Sarah's pizza.
        var chart1 = new google.visualization.PieChart(document.getElementById('1_chart_div'));
        chart1.draw(data, options);
      }

      // Callback that draws the pie chart for Anthony's pizza.
      function draw2Chart() {

        // Create the data table for Anthony's pizza.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php
                foreach($query2 as $rw){
                  echo "['".$rw["il_ad"]."',".$rw["kullanici_memnuniyet_sayisi"]."],";
                }
              ?>
        ]);

        // Set options for Anthony's pie chart.
        var options = {title:'Ziraat Bankası İl Bazlı İstek Kullanıcı Grafiği',
                       width:400,
                       height:300};

        // Instantiate and draw the chart for Anthony's pizza.
        var chart2 = new google.visualization.PieChart(document.getElementById('2_chart_div'));
        chart2.draw(data, options);
      }

      function draw3Chart() {

// Create the data table for Anthony's pizza.
var data = new google.visualization.DataTable();
data.addColumn('string', 'Topping');
data.addColumn('number', 'Slices');
data.addRows([
  <?php
        foreach($query3 as $rw){
          echo "['".$rw["ilce_ad"]."',".$rw["kullanici_memnuniyet"]."],";
        }
      ?>
]);

// Set options for Anthony's pie chart.
var options = {title:'Ziraat Bankası İlçe Bazlı İstek Kullanıcı Grafiği',
               width:400,
               height:300};

// Instantiate and draw the chart for Anthony's pizza.
var chart3 = new google.visualization.PieChart(document.getElementById('3_chart_div'));
chart3.draw(data, options);
}
    </script>
  </head>
  <body>
    <!--Table and divs that hold the pie charts-->
    <table class="columns">
      <tr>
        <td><div id="1_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="2_chart_div" style="border: 1px solid #ccc"></div></td>
        <td><div id="3_chart_div" style="border: 1px solid #ccc"></div></td>
      </tr>
    </table>
  </body>
</html>



        </center></fieldset></div>
