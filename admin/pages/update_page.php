<?php
include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');

error_reporting(1);

foreach ($_POST as $propery => $value) {
    $properyArr[] = $propery;
    $valueArr[] = $value;
}

db::query_update("page_settings", $properyArr, $valueArr, "page_id=" . $_POST['page_id']);

