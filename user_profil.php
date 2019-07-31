<?php


class Profil
{
    static public function get_profil($form)
    {
        $login = $_SESSION['login'];

        $get_data = myPDO::get_data("SELECT " . $form . " FROM users WHERE login = ? ", [$login], true);
        echo $get_data[0];
        return $get_data[0];
    }

    static public function set_profil($column, $form)
    {
        $login = $_SESSION['login'];
        $form = (htmlspecialchars(addslashes($form)));
        $data = profil::get_profil($column);
        //   $check_login = myPDO::get_data("SELECT COUNT(*) FROM users WHERE login = ? ", [$login], true);
        //    $check_mail = myPDO::get_data("SELECT COUNT(*) FROM users WHERE mail = ?", [$mail], true);
        /*   if ($check_login[0] > 0)
               echo 'login already use';
           if ($check_mail[0] > 0)
               echo 'mail already use';*/
        var_dump($data);
        var_dump($form);
        if ($data != $form /*&& $check_mail[0] < 0 && $check_login[0] < 0*/) {
            $_SESSION[$form] = $form;
            myPDO::set_data("UPDATE users SET " . $column . "=" . $form . " WHERE login = ? ", [$login]);
            echo " profil set";
            header('Location: /index.php?p=profil');
        }
    }

    static public function set_new_pass($pass, $pass2)
    {

        $pass = (htmlspecialchars(addslashes($pass)));
        $pass2 = (htmlspecialchars(addslashes($pass2)));
        $login = $_SESSION['login'];
        $check_newpass = profil::get_profil($pass);
        if ($pass == $pass2) {
            $pass = hash('sha256', $pass);
            if ($pass != $check_newpass[0])
                myPDO::set_data("UPDATE users SET password = :pass, WHERE login = ?", array("login" => $login, "pass" => $pass));
        }
    }

    static public function set_login($form)
    {
        $login = $_SESSION['login'];
        $form = (htmlspecialchars(addslashes($form)));

        if ($form != $login) {
            $check_login = myPDO::get_data("SELECT COUNT(*) FROM users WHERE login = ? ", [$form], true);
            if ($check_login[0] < 0) {
                myPDO::set_data("UPDATE users SET " . $login . "=" . $form . " WHERE login = ? ", [$login]);
                $_SESSION['login'] = $form;
            }
            else
                echo 'login already use';
        }
    }
}
