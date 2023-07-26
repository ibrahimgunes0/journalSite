<?php
var_dump(2323);

error_reporting(1);
die();
include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');
foreach ($_POST as $propery => $value) {
    $properyArr[] = $propery;
    $valueArr[] = $value;
}
db::query_insert("page_settings", $properyArr, $valueArr);

