<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"><?=$header?> Sayfası İçeriği</h5>
            <form id="about_us" method="POST" enctype="multipart/form-data">

                <?php
                $page['page_menu_name'] = $page['page_menu_name'] ?: $header;
                ?>
                <style>
                    .form-inline {
                        display: flex;
                        align-items: center;
                    }
                </style>
                <div class="mb-3">
                    <label for="page_menu_name" class="form-label">
                        Menüde Görünecek İsim:
                    </label>
                    <div class="form-inline">
                        <select id="page_show" style="width: 150px" class="form-select me-2" aria-label="Default select example">
                            <option <?php if ($page['page_show'] == 1){echo 'selected';}?> value="1">Göster</option>
                            <option <?php if ($page['page_show'] == 2){echo 'selected';}?> value="2">Gösterme</option>
                        </select>
                        <input style="width: 800px" name="page_menu_name" id="page_menu_name" type="text" class="form-control" autocomplete="off" value="<?=$page['page_menu_name']?>">
                    </div>
                    <div class="form-text">Menüde görünmesini istediğiniz ismi giriniz.</div>
                </div>


                <div class="mb-3">
                    <label for="header" class="form-label"><?=$header?> Başlığı</label>
                    <input name="header" id="header" type="text" class="form-control" autocomplete="off" value="<?=$page['page_header']?>">
                    <div class="form-text">Derginin başlığını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label"><?=$header?> İçeriği</label>
                    <div id="content">
                    </div>
                    <?php
                    $page['page_content'] = str_replace('"','\"',$page['page_content']);
                    ?>
                    <script>
                        ClassicEditor
                            .create( document.querySelector( '#content' ) )
                            .then( content => {

                                console.log( 'Editor was initialized', content );
                                magazineContent = content;
                                magazineContent.setData("<?=$page['page_content']?>")
                            } )
                            .catch( error => {
                                console.error( error );
                            } );
                    </script>
                </div>

                <button type="button" class="btn btn-success m-1" onclick="savePage('<?=$pageName?>','<?=$sendState?>','<?=$pageId?>')">Kaydet</button>
            </form>
        </div>
    </div>
</div>