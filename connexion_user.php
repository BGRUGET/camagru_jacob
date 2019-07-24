<?php

class User{

    private $base_user = 'FROM users WHERE login = :login';

    static public function connexion( $login, $password){
        $login= (htmlspecialchars(addslashes($login)));
        $passe1= (htmlspecialchars(addslashes($password)));
        $new_log = myPDO::get_data("SELECT login , mail, password, status ". self::$base_user ,array("login" => $login), true);
        $status = $new_log[3];
        var_dump($new_log);
        if (isset($new_log[0])) {
            $passe1 = hash('sha256', $passe1);

            if ($new_log[2] != $passe1) {
                echo 'mauvais pass';
            }
            else if ($status == 'u') {

                $_SESSION['login'] = $login;
                header('Location: /index.php?p=profil');
            }
            else
                echo ' veuillez valider votre compte';
        }
        else
            echo 'user inexistant';
    }

   static public function register($login, $mail, $pass, $pass2){

        $login= (htmlspecialchars(addslashes($login))); // protection injection sql
        $mail= (htmlspecialchars(addslashes($mail)));
        $pass= (htmlspecialchars(addslashes($pass)));
        $pass2= (htmlspecialchars(addslashes($pass2)));

        $check_login = myPDO::get_data("SELECT COUNT(*) FROM users WHERE login = :? ",[$login],true);
        $check_mail = myPDO::get_data("SELECT COUNT(*) FROM users WHERE mail = :?",[$mail],true);
        if ($check_login > 0)
            echo 'login already use';
        else if ($check_mail > 0)
            echo 'mail already use';
        else if ($pass != $pass2)
            echo 'mdp2 != mdp1';
        else{
            $pass = hash('sha256', $pass);
            $token = md5(microtime(TRUE)*1000000);
            $sign_up =myPDO::set_data("INSERT INTO users VALUE('',:login, :mail, :pass, :token, :valid,'0')",array("login" => $login, "mail"=>$mail,"pass"=>$pass));
        }


       //Emaill::sendmail("couou@.fr", "nouveau like", "machin a like votre photo");
    }
}
?>
