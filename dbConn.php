<?php
class dbConn
{
    protected static $db;

    //veritabanına bağlanan fonksiyon
    public function __construct()
    {
        try{
            self::$db = new PDO("mysql:host=localhost;dbname=ililce;charset=utf8", "root", "");
        }
        catch (PDOException $exception)
        {
            print $exception->getMessage();
        }
    }
}

//Bölgeleri getiren fonksiyon
    public function getBolgeList()
    {
        $data=array();
        $query = self::$db->query("SELECT DISTINCT bolge from il", PDO::FETCH_ASSOC);
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["bolge"];
            }
        }
        echo json_encode($data);
    }

    //İlleri getiren fonksiyon
 public function getIlList($bolge){
 $data=array();
 $query = self::$db->prepare("SELECT DISTINCT il FROM ilce WHERE bolge=:bolge");
 $query->execute(array(":bolge"=>$bolge));
 if($query->rowCount())
 {
 foreach ($query as $row)
 {
 $data[]=$row["il"];
 }
 }
 echo json_encode($data);
 }

 //İlçeleri getiren fonksiyon
    public function getIlceList($il){
        $data=array();
        $query = self::$db->prepare("SELECT DISTINCT ilce FROM il WHERE il=:il");
        $query->execute(array(":il"=>$il));
        if($query->rowCount())
        {
            foreach ($query as $row)
            {
                $data[]=$row["ilce"];
            }
        }
        echo json_encode($data);
    }

    $(document).ready(function(){
        ajaxFunc("bolge", "", "#bolge");

        $("#bolge").on("change", function(){

            $("#il").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("il", $(this).val(), "#il");

        });

        $("#il").on("change", function(){

            $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
            console.log($(this).val());
            ajaxFunc("ilce", $(this).val(), "#ilce");

        });

        function ajaxFunc(action, name, id ){
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: {action:action, name:name},
                success: function(sonuc){
                    $.each($.parseJSON(sonuc), function(index, value){
                        var row="";
                        row +='<option value="'+value+'">'+value+'</option>';
                        $(id).append(row);
                    });
                }});
        }
    });

?>