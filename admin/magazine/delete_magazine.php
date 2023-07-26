<?php

include_once('../../mysql/connection.php');
include_once('../../language/tr/tr_home.php');

$status=unlink('../../view/images/'.$_POST['cover_photo']);
if($status){
    echo "File deleted successfully";
}else{
    echo "Sorry!";
}
db::query_delete("magazines",array("id"),array($_POST['id']));

