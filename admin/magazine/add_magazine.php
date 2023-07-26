<?php

error_reporting(1);
include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');
$articles = "";
$counter = 0;
foreach($_GET as $prop=>$val){
    $artData = explode("|",$prop);
    if ($artData[1] == $counter){
        $artPropery[] = $artData[0];
        $artValue[] = $val;
    }else{
        db::query_insert("articles", $artPropery, $artValue);
        $articles .= db::$conn->lastInsertId()."|";
        unset($artPropery);
        unset($artValue);
        $artPropery[] = $artData[0];
        $artValue[] = $val;
        $counter++;
    }
}
db::query_insert("articles", $artPropery, $artValue);
$articles .= db::$conn->lastInsertId();
foreach ($_POST as $propery=>$value){
    $properyArr[] = $propery;
    $valueArr[] = $value;
}

$tarih = date("Y-m-d");
$properyArr[] = 'release_date';
$valueArr[] = $tarih;
if ($articles){
    $properyArr[] = 'article_id';
    $valueArr[] = $articles;
}
db::query_insert("magazines", $properyArr, $valueArr);

