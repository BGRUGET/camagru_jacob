<?php


class Mymail
{
    const MAIL_FROM = 'From:noreply@gmail.com' . "\n";

    static public function link_new_account($login, $fname, $lname, $mail, $token){

        $subject = 'Check mail Camabelagruge';
        $message = ' hello '.$fname.' '.$lname.',
                            Thanks for signing up!
                            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                            ------------------------
                            login: '.$login.'
                            ------------------------
                             
                            Please click this link to activate your account:
                            http://'.$_SERVER['HTTP_HOST'].'/index.php?p=activateaccount&email='.$mail.'&token='.$token.'';

        $testmail = mail($mail, $subject, $message, self::MAIL_FROM);
        var_dump($testmail);

    }

    static public function link_new_pass($login, $fname, $lname, $mail, $token){

        $subject = 'New mail Camabelagruge';
        $message = ' hello '.$fname.' '.$lname.' alias '.$login.',
                            you are a bollos !!!!
                            
                         
                            Please click this link to change your password:
                            http://' . $_SERVER['HTTP_HOST'] . '/index.php?p=setnewpass&email='.$mail. '&token='.$token.'';
        mail($mail, $subject, $message, self::MAIL_FROM);

    }
    static public function mail_comment($login, $mail, $perso, $comment, $heure, $mois){

        $subject = 'New mail Camabelagruge';
        $message = ' hello '.$login.',
                            '.$perso.' let you this comment : '.$comment .
                                'at'.$heure .'on'. $mois ;
        mail($mail, $subject, $message, self::MAIL_FROM);

    }

    //static public function new_like(){
}