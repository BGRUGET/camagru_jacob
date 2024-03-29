<?php

class User
{
    static public function connexion($login, $password)
    {
        $login = (htmlspecialchars(addslashes($login)));
        $passe1 = (htmlspecialchars(addslashes($password)));
        $new_log = myPDO::get_data("SELECT login , mail, password, status FROM users WHERE login = :login", array("login" => $login), true);
        $status = $new_log[3];
        if (isset($new_log[0])) {
            $passe1 = hash('sha256', $passe1);

            if ($new_log[2] != $passe1) {
                echo 'mauvais pass';
            } else if ($status == 'u' || $status == 'comment' || $status == 'like' || $status == 'like comment') {

                $_SESSION['login'] = $login;
                $_SESSION['mail'] = $new_log[1];
                header('Location: /index.php?p=profil');
            } else
                echo ' veuillez valider votre compte';
        } else
            echo 'user inexistant';
    }

    static public function register($login, $fname, $lname, $mail, $pass, $pass2 )
    {

        $login = (htmlspecialchars(addslashes($login))); // protection injection sql
        $mail = (htmlspecialchars(addslashes($mail)));
        $pass = (htmlspecialchars(addslashes($pass)));
        $pass2 = (htmlspecialchars(addslashes($pass2)));
        $fname =(htmlspecialchars(addslashes($fname)));
        $lname = (htmlspecialchars(addslashes($lname)));
        $key_user = md5(microtime(TRUE)*100000);

        $check_login = myPDO::get_data("SELECT COUNT(*) FROM users WHERE login = ? ", [$login], true);
        $check_mail = myPDO::get_data("SELECT COUNT(*) FROM users WHERE mail = ?", [$mail], true);
        if ($check_login[0] > 0)
            echo 'login already use';
        else if ($check_mail[0] > 0)
            echo 'mail already use';
        else if (!preg_match( '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,16}/', $pass))
            echo 'mdp doit contenir au moins 1 maj && 1 min && 1 chiffre && entre 8 et 16 char ';
        else if($pass != $pass2)
            echo 'mdp2 != mdp1';
        else {
            $pass = hash('sha256', $pass);
            $token = md5(microtime(TRUE) * 1000000);
            myPDO::set_data("INSERT INTO users VALUE('',:login, :fname, :lname, '', default , :mail, :password, NOW(), :token,'','',:key_user)", array("login" => $login, "fname" => $fname,"lname" => $lname, "mail" => $mail, "password" => $pass, "token" => $token, "key_user" => $key_user));
            Mymail::link_new_account($login, $fname, $lname, $mail, $token);
            header('Location: /index.php?p=signin');
        }
    }



    static public function get_user()
    {
        if (isset($_SESSION['login']))
            return (TRUE);
        else
            return (FALSE);
    }


    static public function validate_new_account($mail, $token){

        $mail = (htmlspecialchars(addslashes($mail)));
        $token = (htmlspecialchars(addslashes($token)));

        $check_link = myPDO::get_data("SELECT mail, token FROM users WHERE mail = ? ", [$mail], true);

        if ($check_link[0] == $mail && $check_link[1] == $token)
            myPDO::set_data("UPDATE users SET status ='u', token = '' WHERE mail= ?", [$mail], true);
    }

    static public function forget_pass($mail){

        $mail = (htmlspecialchars(addslashes($mail)));
        $check_mail = myPDO::get_data("SELECT login, fname, lname, COUNT(*) FROM users WHERE mail = ?", [$mail] , true);
        if ($check_mail[0]){
            $login = $check_mail[0];
            $token = md5(microtime(TRUE) * 1000000);
            $fname = $check_mail[1];
            $lname = $check_mail[2];
            myPDO::set_data("UPDATE users SET token = :token WHERE mail = :mail",array("token"=>$token, "mail" =>$mail));
            Mymail::link_new_pass($login, $fname, $lname, $mail, $token);
            header('Location: /index.php?p=signin');
        }
        else
            echo 'wrong mail' ;

    }

    static public function set_new_pass($mail, $token, $pass, $pass2 ){

        if (!preg_match( '/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{8,16}/', $pass)) {
            echo 'mdp doit contenir au moins 1 maj && 1 min && 1 chiffre && entre 8 et 16 char ';
            header('Location: /index.php?p=setnewpass');
        }
        $mail = (htmlspecialchars(addslashes($mail)));
        $token = (htmlspecialchars(addslashes($token)));
        $pass = (htmlspecialchars(addslashes($pass)));
        $pass2 = (htmlspecialchars(addslashes($pass2)));
        $check_newpass = myPDO::get_data("SELECT mail, token FROM users WHERE mail = ?", [$mail], true);
        if ($pass == $pass2 && $mail == $check_newpass[0] && $token == $check_newpass[1]) {
            $pass = hash('sha256', $pass);
            myPDO::set_data("UPDATE users SET password = :pass, token = '' WHERE mail = :mail",array("mail" => $mail, "pass" => $pass));
            header('Location: /index.php?p=signin');
        }
    }
}

?>
