<?php
include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');
//include_once ('login_control.php');
$magazine = db::query_fetch_assoc("SELECT * FROM magazines WHERE id='" . $_POST['id'] . "'");
if ($magazine['article_id']) {
    $articleArr = explode("|", $magazine['article_id']);
}
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dergi Düzenle</h5>
            <form id="add_magazine" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="header" class="form-label">Dergi Başlığı</label>
                    <input name="header" id="header" type="text" class="form-control" autocomplete="off"
                           value="<?= $magazine['header'] ?>">
                    <div class="form-text">Derginin başlığını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="issn" class="form-label">ISSN</label>
                    <input name="issn" id="issn" type="text" class="form-control" autocomplete="off"
                           value="<?= $magazine['issn'] ?>">
                    <div class="form-text">Derginin ISSN numarasını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Derginin İçeriği</label>
                    <div id="content">
                    </div>
                    <script>
                        ClassicEditor
                            .create(document.querySelector('#content'))
                            .then(content => {

                                console.log('Editor was initialized', content);
                                magazineContent = content;
                                magazineContent.setData("<?=$magazine['content']?>")
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>
                </div>

                <div class="mb-3">
                    <label for="cover_photo" class="form-label">Dergi Kapak Fotoğrafı</label>
                    <img style="max-width: 100px; max-height: 100px;" id="cover_photo_dump"
                         src="../view/images/<?= $magazine['cover_photo'] ?>" alt="Önizleme">
                    <br><br>
                    <input type="file" name="cover_photo" id="cover_photo" class="form-control" accept="image/*"
                           onclick="window.open('image_upload.php?place=cover_photo','','_blank');">
                    <div class="form-text">Derginizi temsil edecek kapak fotoğrafını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="cover_photo" class="form-label">Dergi Makale Ekle</label>

                    <input type="file" name="article" id="article" class="form-control"
                           onclick="window.open('image_upload.php?place=pdf_file','','_blank');">
                </div>

                <div class="mb-3">
                    <label for="cover_photo" class="form-label">Eklenen Makaleler</label>
                    <table class="table" id="article_table">
                        <thead>
                        <tr>
                            <th scope="row">Sıra</th>
                            <th scope="col">Başlık</th>
                            <th scope="col">Dosya Adi</th>
                            <th scope="col">Sil</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php for ($i = 0; $i < count($articleArr); $i++) {
                            $article = db::query_fetch_assoc("SELECT * FROM articles WHERE id=".$articleArr[$i]);
                            ?>
                            <tr id="attr_<?=$i?>">
                                <td><?=$article['order_number']?></td>
                                <td><?=$article['title']?></td>
                                <td><?=$article['file_path']?></td>
                                <td><i onclick="deleteArticle('../view/articles/<?=$article['file_path']?>','attr_<?=$i?>')"
                                       style="font-size: 25px; color: #e33c3c" class="bi bi-trash3"></i>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-success m-1" onclick="updateMagazine(<?= $_POST['id'] ?>,'save')">
                    Kaydet
                </button>
            </form>
        </div>
    </div>
</div>
