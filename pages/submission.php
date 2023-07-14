<?php

include_once('../mysql/connection.php');
include_once('../language/tr/tr_home.php');
//include_once ('login_control.php');
error_reporting(1);
$pageId = db::query_fetch_column("SELECT page_id FROM page_settings WHERE page_name='submission'");
$sendState = $pageId > 0 ? "edit" : "save";
$page = db::query_fetch_assoc("SELECT * FROM page_settings WHERE page_id='".$pageId."'");
$header = "Hakkımızda";
?>
<div class="container">
    <h2><?=$page['page_header']?></h2>
    <hr>
    <?=$page['page_content']?>
</div>

