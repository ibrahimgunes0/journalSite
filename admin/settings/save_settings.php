<?php
include_once ('../../mysql/connection.php');
include_once ('../../language/tr/tr_home.php');

$place = explode("_",$_POST['place'])[0];

$dataOld = explode("|",$_POST['data']);
error_reporting(1);
db::query_delete("site_settings",array("place"),array($place));

foreach ($dataOld as $data){
    $dataArr = explode("=",$data);
    $dataArr[1] = urldecode($dataArr[1]);
    db::query_insert("site_settings",array("property","value","place"),array($dataArr[0],$dataArr[1],$place));
}
?>

<script>
    alert('Ayarlar Kaydedildi')
</script>
