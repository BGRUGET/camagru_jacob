<?php
require_once('header.php');
require_once ('database.php');
    include __DIR__ . '/nav.php';
    $valid_cle = 0;
    $valid_mail = 0;
    $mail_link=(htmlspecialchars(addslashes($_GET['email'])));
    $cle_link= (htmlspecialchars(addslashes($_GET['hash'])));

$checkmail = $database->prepare("SELECT mail FROM users WHERE mail = ? ");
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
{
    $activate = $database->prepare("UPDATE users SET status ='u', id_unique = '' WHERE mail= ?");
    $activate->bindValue(1, $mail_link);
    $activate->execute();

    header('Location: /signin.php');
}