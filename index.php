<?php
if (!isset($_SESSION['se_path'])) {$_SESSION['se_path'] = str_replace("\\","/",getcwd())."/";}

include_once ('mysql/connection.php');
include_once ('language/tr/tr_home.php');
//error_reporting(1);
$siteTitle = db::getSiteSetting('site_title')?:"title";
$siteIssn = db::getSiteSetting('site_issn')?:"title";
$siteHeader = db::getSiteSetting('site_header')?:"Header";
$siteHeaderSize = db::getSiteSetting('site_header_size')?:"100";
$siteHeaderColor = db::getSiteSetting('site_header_color')?:"#70d67f";
$magazines = db::query_fetch_assoc("SELECT * FROM magazines","fetchAll")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$siteTitle?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/main.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div style="
        float: left;
        margin-left: 10px;
        position:absolute;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 200px;
        background: <?=$siteHeaderColor?>;
        ">
    <img src="view/images/site_logo.png" style="float: left; ">
</div>
<div style="
    display: flex;
    align-items: center;
    justify-content: center;
    height: 200px;
    background: <?=$siteHeaderColor?>;
    ">

    <div>
        <h1 style="margin-left:50px; font-size: <?=$siteHeaderSize?>px">
            <?=$siteHeader?>
        </h1>
    </div>
    <div style="
    position: absolute;
    left: 0;
    top: 0;
    font-family: fantasy;
    padding-left: 10px;">
        <p>ISSN: <?=$siteIssn?></p>
    </div>
</div>
<?php include_once 'view/templates/navbar.php';?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9" id="div_main">
            <?php include_once 'products/product_list.php'; ?>
        </div>
        <div class="col-lg-3">
            <div class="widget-top"><h4>Arşiv</h4><div class="stripe-line"></div></div>
            <ul>
                <?php for ($j = 0; $j < count($magazines);$j++){?>
                <li><?= $magazines[$j]['header']?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>
<script src="view/js/main.js"></script>
<script src="view/js/jquery-3.6.0.min.js"></script>
</body>
</html>




