<?php


class Mymail
{
    const MAIL_FROM = 'From:noreply@gmail.com' . "\r\n";

    static public function link_new_account($login, $mail, $token){

        $subject = 'Check mail Camabelgruge';
        $message = ' hello '.$login.',
                            Thanks for signing up!
                            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
                            ------------------------
                            Username: '.$login.'
                            ------------------------
                             
                            Please click this link to activate your account:
                            http://'.$_SERVER['HTTP_HOST'].'/index.php?p=activateaccount&email='.$mail.'&token='.$token.'';

        mail($mail, $subject, $message, self::MAIL_FROM);

    }

    static public function link_new_pass( $login, $mail, $token){

        $subject = 'New mail Camabelagruge';
        $message = ' hello ' . $login . ',
                            you are a bollos !!!!
                            
                         
                            Please click this link to change your password:
                            http://' . $_SERVER['HTTP_HOST'] . '/index.php?p=setnewpassword&email='.$mail. '&token='.$token.'';
        mail($mail, $subject, $message, self::MAIL_FROM);

    }

    //static public function new_like(){
}