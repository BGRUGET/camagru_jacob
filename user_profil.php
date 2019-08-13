<?php


class Profil
{
    static public function get_profil($form)
    {
        $login = $_SESSION['login'];

        $get_data = myPDO::get_data("SELECT " . $form . " FROM users WHERE login = ? ", [$login], true);
        if ($form == 'notif') {
            if ($get_data[0] !== '1')
                return'';
            else
                return 'checked';
        }
        return $get_data[0];
    }

    static public function set_profil($column, $form)
    {
        $login = $_SESSION['login'];
        $form = (htmlspecialchars(addslashes($form)));
        $data = profil::get_profil($column);
        if ($data != $form) {
            if ($column == 'login') {
                $check_login = myPDO::get_data("SELECT COUNT(*) FROM users WHERE login = ? ", [$form], true);
                if ($check_login[0] > 0) {
                    echo 'login already use';
                    die();
                }
            }
            $_SESSION[$column] = $form;
            myPDO::set_data("UPDATE users SET " . $column . "= :column WHERE login = :login ", array("login" => $login, "column" => $form));
            echo "profil set";
            header('Location: /index.php?p=profil');
        }
    }

    static public function set_new_pass($pass, $pass2)
    {

        $pass = (htmlspecialchars(addslashes($pass)));
        $pass2 = (htmlspecialchars(addslashes($pass2)));
        $login = $_SESSION['login'];
        $check_newpass = profil::get_profil('password');

        if ($pass == $pass2) {
            $pass = hash('sha256', $pass);
            if ($pass !== $check_newpass)
                myPDO::set_data("UPDATE users SET password = :pass WHERE login = :login", array("login" => $login, "pass" => $pass));
            else
                echo 'same mdp';
        }
    }


    static public function set_notif($check)
     {
         $login = $_SESSION['login'];
         if (isset($check) && !empty($check))
            $check ='1';
         else
             $check ='0';
          myPDO::set_data("UPDATE users SET notif = :notif WHERE login = :login", array("login" => $login, "notif" => $check));
     }


    static public function set_pic($pic)
    {

        $pic = (htmlspecialchars(addslashes($pic)));
        $pass2 = (htmlspecialchars(addslashes($pass2)));
        $login = $_SESSION['login'];
        $check_newpass = profil::get_profil('password');

        if ($pass == $pass2) {
            $pass = hash('sha256', $pass);
            if ($pass !== $check_newpass)
                myPDO::set_data("UPDATE users SET password = :pass WHERE login = :login", array("login" => $login, "pass" => $pass));
            else
                echo 'same mdp';
        }
    }
}