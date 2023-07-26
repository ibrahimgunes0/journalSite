<?php

include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');

error_reporting(1);
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
if ($_GET){
    db::query_insert("articles", $artPropery, $artValue);
    $articles .= db::$conn->lastInsertId();
}

foreach ($_POST as $propery=>$value){
    $properyArr[] = $propery;
    $valueArr[] = $value;
}
if ($articles){
    $properyArr[] = 'article_id';
    $valueArr[] = $articles;
}else{
    $properyArr[] = 'article_id';
    $valueArr[] = '';
}
db::query_update("magazines", $properyArr, $valueArr, "id=".$_POST['id']);

