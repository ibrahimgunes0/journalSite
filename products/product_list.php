
<section class="section-products">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>Son Yayınlanan Dergiler</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <?php
            foreach ($magazines as $magazine) {
                ?>
                <style>
                    #product_<?=$magazine['id']?> .part-1::before {
                        background: url("view/images/<?=$magazine['cover_photo']?>") no-repeat center;
                        background-size: cover;
                        transition: all 0.3s;
                    }
                </style>
                <!-- Single Product -->
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div onclick="loadMagazine(<?=$magazine['id']?>)" id="product_<?=$magazine['id']?>" class="single-product">
                        <div class="part-1">
                        </div>
                        <div class="part-2">
                            <h3 class="product-title"><?=$magazine['header']?></h3>
                            <h4 class="product-price">ISSN: <?=$magazine['issn']?></h4>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>