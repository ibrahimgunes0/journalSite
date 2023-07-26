<?php
include_once('../mysql/connection.php');
include_once('../language/tr/tr_home.php');
//include_once ('login_control.php');
$magazine = db::query_fetch_assoc("SELECT * FROM magazines WHERE id='" . $_GET['id'] . "'");
if ($magazine['article_id']) {
    $articleArr = explode("|", $magazine['article_id']);
}
?>
<style>

</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Dergi Önizleme</h3>
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box">
                        <img  src="view/images/<?= $magazine['cover_photo'] ?>" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <div class="mb-3">
                        <label for="cover_photo" class="form-label">Eklenen Makaleler</label>
                        <table class="table" id="article_table">
                            <thead>
                            <tr>
                                <th scope="row">Sıra</th>
                                <th scope="col">Başlık</th>
                                <th scope="col">Dosya Yükleme Tarihi</th>
                                <th scope="col">İndir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (count($articleArr) > 0){
                            for ($i = 0; $i < count($articleArr); $i++) {
                                $article = db::query_fetch_assoc("SELECT * FROM articles WHERE id=".$articleArr[$i]);
                                $timestamp = substr($article['file_path'], 0, 8); // Yıl, ay ve günü alarak zaman damgası oluştur
                                $formattedDate =substr($timestamp,0,2)."/".substr($timestamp,2,2)."/".substr($timestamp,4,8);
                                ?>
                                <tr id="attr_<?=$i?>">
                                    <td><?=$article['order_number']?></td>
                                    <td><?=$article['title']?></td>
                                    <td><?=$formattedDate?></td>
                                    <td>
                                        <a href='view/articles/<?=$article['file_path']?>' download><i style="font-size: 25px; color: #139103" class="bi-file-earmark-arrow-down-fill"></i></a>


                                    </td>
                                </tr>
                            <?php }
                            }else{ ?>
                            <tr>
                                <td colspan="4">Makale Bulunamadı</td>
                            <tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="box-title m-lg-3"><?= $magazine['header'] ?></h4>
                    <div class="overflow-auto" style="max-height: 250px;">
                        <p class="m-lg-3">
                            <?=$magazine['content']?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">Genel Bilgiler</h3>
                    <div class="table-responsive">
                        <table class="table table-striped table-product">
                            <tbody>
                            <tr>
                                <td width="390">Durum</td>
                                <td><?=$magazine['state']?></td>
                            </tr>
                            <tr>
                                <td>ISSN</td>
                                <td><?=$magazine['issn']?></td>
                            </tr>
                            <tr>
                                <td>Yayınlanma Tarihi</td>
                                <td><?=$magazine['release_date']?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

