<?php
include_once ('../../mysql/connection.php');
include_once ('../../language/tr/tr_home.php');
//include_once ('login_control.php');

?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dergi Ekle</h5>
            <form id="add_magazine"  method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="header" class="form-label">Dergi Başlığı</label>
                    <input name="header" id="header" type="text" class="form-control" autocomplete="off" value="">
                    <div class="form-text">Derginin başlığını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="issn" class="form-label">ISSN</label>
                    <input name="issn" id="issn" type="text" class="form-control" autocomplete="off" value="">
                    <div class="form-text">Derginin ISSN numarasını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Derginin İçeriği</label>
                    <div id="content">
                    </div>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#content' ) )
                            .then( content => {
                                console.log( 'Editor was initialized', content );
                                magazineContent = content;
                            } )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>

                <div class="mb-3">
                    <label for="cover_photo" class="form-label">Dergi Kapak Fotoğrafı</label>
                    <img style="max-width: 100px; max-height: 100px;" id="cover_photo_dump"  src="" alt="Önizleme">
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
                      
                        </tbody>
                    </table>
                </div>



                <button type="button" class="btn btn-success m-1" onclick="saveMagazine('add_magazine')">Kaydet</button>
            </form>
        </div>
    </div>
</div>
