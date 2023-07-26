<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dosyanın yüklendiği dizin

    if ($_GET['place'] == "site_logo"){

    $hedef_dizin = "../view/images/";

    // Hedef dizini kontrol edin ve yoksa oluşturun
    if (!file_exists($hedef_dizin)) {
        mkdir($hedef_dizin, 0777, true);
    }

    // Yüklenen dosyanın bilgilerini alın
    $gecici_dosya = $_FILES['resim']['tmp_name'];
    $dosya_adi = $_FILES['resim']['name'];

    if ($_GET['place'] == "site_logo"){
        $dosya_adi = $_GET['place'].".png";
    }
    $hedef_dosya = $hedef_dizin . $dosya_adi;
    // Dosyayı hedef konuma taşıyın
    if (move_uploaded_file($gecici_dosya, $hedef_dosya)) {
        echo "Resim başarıyla yüklendi: " . $hedef_dosya;
        ?>
        <img style="width: 200px; height: 200px;" src='../view/images/<?=$dosya_adi?>'/>
        <button type="button" onclick="window.opener=window.opener.showImage('../view/images/<?=$dosya_adi?>',{id:'<?=$_GET['place']?>'});window.close();">Tamam</button>
        <?php
    } else {
        echo "Dosya yüklenirken bir hata oluştu.";
    }
    }elseif ("pdf_file"){
        if(isset($_FILES['pdfDosyasi']) && $_FILES['pdfDosyasi']['error'] === UPLOAD_ERR_OK) {
            $hedefDosya = "../view/articles/".date("dmYHis") . ".pdf";
            if(move_uploaded_file($_FILES['pdfDosyasi']['tmp_name'], $hedefDosya)) {
                echo 'Makale başarıyla yüklendi ve kaydedildi.';
                echo basename($_FILES['pdfDosyasi']['name']);
                ?>
                <button type="button" onclick="window.opener=window.opener.restoreArticle('<?=$_POST['articleTitle']?>','<?=$hedefDosya?>');window.close();">Tamam</button>
                <?php
            } else {
                echo 'Makale kaydedilirken bir hata oluştu.';
            }
        } else {
            echo 'Makale yüklenirken bir hata oluştu.';
        }
    }
}else{
if ($_GET['place'] == "site_logo"){
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="resim" />
        <input type="submit" value="Resim Ekle" />
    </form>
<?php }else{?>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Makalenin başlığını giriniz ardından dosya seçiniz</label><br><br>
        <input name="articleTitle" id="articleTitle" type="text" class="form-control" autocomplete="off" value=""><br><br>
        <input type="file" name="pdfDosyasi" />
        <input type="submit" value="Makale Ekle" />
    </form>
<?php }
}
?>
