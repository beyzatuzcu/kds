<?php
$baglan=mysqli_connect("127.0.0.1","root","","kds");
mysqli_set_charset($baglan, "utf8");

$b_ozellik=isset($_POST["b_ozellik"]);
$o_id=isset($_POST["o_id"]);

mysqli_query($baglan,"INSERT INTO kullanicilar ( b_ozellik,o_id)
 VALUES ('".$b_ozellik."','".$o_id."')");

?>



