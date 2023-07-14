<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4"><?=$header?> Sayfası İçeriği</h5>
            <form id="about_us" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="header" class="form-label"><?=$header?> Başlığı</label>
                    <input name="header" id="header" type="text" class="form-control" autocomplete="off" value="<?=$page['page_header']?>">
                    <div class="form-text">Derginin başlığını giriniz.</div>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label"><?=$header?> İçeriği</label>
                    <div id="content">
                    </div>
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


                <button type="button" class="btn btn-success m-1" onclick="savePage('about_us','<?=$sendState?>','<?=$pageId?>')">Kaydet</button>
            </form>
        </div>
    </div>
</div>