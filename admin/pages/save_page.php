<?php


include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');

foreach ($_POST as $propery => $value) {
    $properyArr[] = $propery;
    $valueArr[] = $value;
}
db::query_insert("page_settings", $properyArr, $valueArr);

