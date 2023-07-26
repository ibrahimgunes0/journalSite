<?php
$dosyaAdi = "../".$_GET['fileName']; // Silmek istediğiniz dosyanın adı veya yolu

if (file_exists($dosyaAdi)) {
    if (unlink($dosyaAdi)) {
        echo 'Dosya başarıyla silindi.';
    } else {
        echo 'Dosya silinirken bir hata oluştu.';
    }
} else {
    echo 'Dosya mevcut değil.';
}
