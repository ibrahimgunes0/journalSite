<?php
if ($_POST['process'] === "login") {
    if ($_SESSION['loginControl'] !== true) {
        $loginCheck = db::loginControl($_POST['user_name'], $_POST['password']);
        if ($loginCheck) {
            $_SESSION['loginControl'] = true;
        } else {
            $_SESSION['loginControl'] = false;
            echo 'Kullanıcı adı veya şifre yanlış';
            include "authentication_login.php";
            die();
//        header("Location: authentication_login.php");
        }
    }
}elseif ($_POST['process'] === "register"){
    $registerCheck = db::register($_POST['name'],$_POST['user_name'], $_POST['password']);
    if ($registerCheck) {
        echo 'Kayıt işlemi başarı ile gerçekleşti';
        include "authentication_login.php";
        die();
    } else {
        var_dump($registerCheck);
        die();
//        header("Location: authentication_login.php");
    }
}else{
    if ($_SESSION['loginControl'] !== true) {
        $loginCheck = db::loginControl($_POST['user_name'], $_POST['password']);
        if ($loginCheck) {
            $_SESSION['loginControl'] = true;
        } else {
            $_SESSION['loginControl'] = false;
            echo 'Kullanıcı adı veya şifre yanlış';
            include "authentication_login.php";
            die();
//        header("Location: authentication_login.php");
        }
    }
}
?>