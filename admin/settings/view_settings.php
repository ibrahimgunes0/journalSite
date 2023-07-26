<?php
include_once ('../../mysql/connection.php');
include_once ('../../language/tr/tr_home.php');
//include_once ('login_control.php');
$siteTitle = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_title'");
$siteIssn = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_issn'");
$siteLogo = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_logo_src'");
$siteHeader = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_header'");
$siteHeaderSize = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_header_size'");
$siteHeaderSize = $siteHeaderSize ?: 100;
$siteHeaderColor = db::query_fetch_column("SELECT value FROM site_settings WHERE place='view' AND property='site_header_color'");

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Site Görünüm Ayarları</h5>
                <form id="view_settings"  method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="site_title" class="form-label">Site Title:</label>
                        <input name="site_title" id="site_title" type="text" class="form-control" autocomplete="off" value="<?=$siteTitle?>">
                        <div class="form-text">Sitenin sekme kısımında görünmesini istediğiniz başlığı giriniz.</div>
                    </div>

                    <div class="mb-3">
                        <label for="site_issn" class="form-label">Site ISSN:</label>
                        <input name="site_issn" id="site_issn" type="text" class="form-control" autocomplete="off" value="<?=$siteIssn?>">
                        <div class="form-text">Sitenin sekme kısımında görünmesini istediğiniz başlığı giriniz.</div>
                    </div>

                    <div class="mb-3">
                        <label for="site_header_color" class="form-label">Site Üst Rengi:</label>
                        <input name="site_header_color" id="site_header_color" type="color" class="form-control" value="<?=$siteHeaderColor?>">
                        <div class="form-text">Sitenin üst kısmındaki arka plan rengini değiştirmek için giriniz.</div>
                    </div>

                    <div class="mb-3">
                        <label for="site_logo" class="form-label">Site Logosu:</label>
                        <img style="max-width: 100px; max-height: 100px;" id="site_logo_dump"  src="../view/images/site_logo.png" alt="Önizleme">
                        <br><br>
                        <input type="file" name="site_logo" id="site_logo" class="form-control" accept="image/*"
                               onclick="window.open('image_upload.php?place=site_logo','','_blank');">
                        <div class="form-text">Sitenin üst kısmında görünmesini istediğiniz resimi yükleyiniz.</div>
                    </div>

                    <div class="mb-3">
                        <label for="site_header" class="form-label">Site Başlık:</label>
                        <input name="site_header" id="site_header" type="text" class="form-control" autocomplete="off" value="<?=$siteHeader?>">
                        <div class="form-text">Sitenin üst kısmında görünmesini istediğiniz başlığı yazınız.</div>
                    </div>

                    <div class="mb-3">
                        <label for="site_header_size" class="form-label">Başlık Yazı Boyutu:</label>
                        <input name="site_header_size" id="site_header_size" type="text" class="form-control" autocomplete="off" value="<?=$siteHeaderSize?>">
                        <div class="form-text">Sitenin üst kısmında görünmesini istediğiniz başlığın boyutunu belirleyiniz.</div>
                    </div>

                    <button type="button" class="btn btn-success m-1" onclick="saveSettings('view_settings')">Kaydet</button>
                </form>
        </div>
    </div>
</div>
