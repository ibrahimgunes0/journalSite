<?php

include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');
//include_once ('login_control.php');

$pageId = db::query_fetch_column("SELECT page_id FROM page_settings WHERE page_name='author_guidelines'");
$sendState = $pageId > 0 ? "edit" : "save";
$page = db::query_fetch_assoc("SELECT * FROM page_settings WHERE page_id='".$pageId."'");
$header = "Yazar Yönergeleri";

$pageName = "author_guidelines";
include_once "general_page_form.php";
?>