<?php
include_once ('../../mysql/connection.php');
include_once ('../../language/tr/tr_home.php');
//include_once ('login_control.php');
$users = db::query_fetch_assoc("SELECT * FROM users","fetchAll");
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Site Güvenlik Ayarları</h5>
            <form id="security_settings">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Adı</th>
                        <th scope="col">Kullanıcı Adı</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Yetki</th>
                        <th scope="col">Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $user){?>
                        <tr>
                            <th scope="row"><?=$user['id']?></th>
                            <td><?=$user['name']?></td>
                            <td><?=$user['user_name']?></td>
                            <td><?=$user['email']?></td>
                            <td><?=$user['authority']?></td>
                            <td><?=$user['state']?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
<!--                <button type="button" class="btn btn-success m-1" onclick="saveSettings('security_settings')">Kaydet</button>-->
            </form>
        </div>
    </div>
</div>
