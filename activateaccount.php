<?php


user::validate_new_account($_GET['email'], $_GET['token']);

/*$checkmail = $database->prepare("SELECT mail FROM users WHERE mail = ? ");
$checkmail->bindValue(1, $mail_link);
$checkmail->execute();
$mail_db = $checkmail->fetch();
if ($mail_db[0] === $mail_link) {
    $valid_mail = 1;
}
$cle = $database->prepare("SELECT id_unique FROM users WHERE mail = ? ");
$cle->bindValue(1, $mail_link);
$cle->execute();
$cle_db = $cle->fetch();
if ($cle_db[0] === $cle_link) {
    $valid_cle = 1;
}
if ($valid_mail == 1 && $valid_cle == 1)
{/*
    $activate = $database->prepare("UPDATE users SET status ='u', id_unique = '' WHERE mail= ?");
    $activate->bindValue(1, $mail_link);
    $activate->execute();
    MyPDO::set_data("UPDATE users SET status ='u', id_unique = '' WHERE mail= ?", [$mail_link]);


}*/
header('Location: /index.php?p=signin');