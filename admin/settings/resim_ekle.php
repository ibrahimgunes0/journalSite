<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Dosyanın yüklendiği dizin
    $hedef_dizin = "uploads/";

    // Hedef dizini kontrol edin ve yoksa oluşturun
    if (!file_exists($hedef_dizin)) {
        mkdir($hedef_dizin, 0777, true);
    }

    // Yüklenen dosyanın bilgilerini alın
    $gecici_dosya = $_FILES['resim']['tmp_name'];
    $dosya_adi = $_FILES['resim']['name'];
    $hedef_dosya = $hedef_dizin . $dosya_adi;

    // Dosyayı hedef konuma taşıyın
    if (move_uploaded_file($gecici_dosya, $hedef_dosya)) {
        echo "Resim başarıyla yüklendi: " . $hedef_dosya;
    } else {
        echo "Dosya yüklenirken bir hata oluştu.";
    }
}
?>
