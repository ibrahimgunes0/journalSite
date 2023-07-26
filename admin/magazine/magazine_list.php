<?php
include_once ('../../mysql/connection.php');
include_once ('../../language/tr/tr_home.php');
//include_once ('login_control.php');
$magazines = db::query_fetch_assoc("SELECT * FROM magazines","fetchAll");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Dergi Listesi</h5>
            <form id="security_settings">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Başlık</th>
                        <th scope="col">içerik</th>
                        <th scope="col">Kapak Fotoğrafı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">ISSN</th>
                        <th scope="col">Yayınlanma Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($magazines as $magazine){?>
                        <tr>
                            <th scope="row"><?=$magazine['id']?></th>
                            <td><?=$magazine['header']?></td>
                            <td><?=$magazine['content']?></td>
                            <td><?=$magazine['cover_photo']?></td>
                            <td><?=$magazine['state']?></td>
                            <td><?=$magazine['issn']?></td>
                            <td><?=$magazine['release_date']?></td>
                            <td>
                                <i onclick="deleteMagazine(<?=$magazine['id']?>,'<?=$magazine['cover_photo']?>')" style="font-size: 25px; color: #e33c3c" class="bi bi-trash3"></i>
                                <i onclick="updateMagazine(<?=$magazine['id']?>)"style="margin-left: 10px; font-size: 25px" class="bi bi-pencil-square"></i>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <!--                <button type="button" class="btn btn-success m-1" onclick="saveSettings('security_settings')">Kaydet</button>-->
            </form>
        </div>
    </div>
</div>
