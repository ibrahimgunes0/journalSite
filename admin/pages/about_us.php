<?php

include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');
//include_once ('login_control.php');

error_reporting(1);
$pageId = db::query_fetch_column("SELECT page_id FROM page_settings WHERE page_name='about_us'");
$sendState = $pageId > 0 ? "edit" : "save";
$page = db::query_fetch_assoc("SELECT * FROM page_settings WHERE page_id='".$pageId."'");
$header = "Hakkımızda";
$pageName = "about_us";
include_once "general_page_form.php";
?>

