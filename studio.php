<?php


class studio
{
    static public function photodb($src, $result)
    {
        $test_filtre = imagecreatefrompng('/var/www/html/' . $src);
        $test_original = imagecreatefrompng($result);
        $user = $_SESSION['login'];
        $cle = md5(microtime(TRUE) * 100000);
        $name = md5(microtime(TRUE) * 100000);
        $login = $_SESSION['login'];
        $key_user = myPDO:: get_data("SELECT key_user FROM users where login = :login", array('login' => $login), true);
        $_SESSION['key_user'] = $key_user;
        imagecopy($test_original, $test_filtre, 0, 0, 0, 0, getimagesize('/var/www/html/' . $src)[0] , getimagesize('/var/www/html/' . $src)[1] );
        imagejpeg($test_original, '/var/www/html/final/' . $name . '.jpeg');
        header('Location: index.php?p=studio');
        myPDO:: set_data("INSERT INTO pictures VALUE ('', :content, :key_user, :valid, '', :id_unique, :login)", array('content' => 'final/' . $name . '.jpeg', 'key_user' => $key_user[0], 'valid' => '1', 'id_unique' =>$cle, 'login' => $user));
    }

    static public function miniature()
    {
        $login = $_SESSION['login'];
        return myPDO:: get_data("SELECT content FROM `pictures` WHERE login=? order by id DESC", [$login], false);

    }

    static public function affpic()
    {
        $login = $_SESSION['login'];
        $check1 = myPDO:: get_data("SELECT key_user FROM users where login = ?", [$login],true);
        return myPDO:: get_data("SELECT id, content FROM pictures WHERE key_user = :key_user ORDER BY id DESC", array('key_user' => $check1[0]) ,false);
    }
    static public function delpic($data)
    {
        $login = $_SESSION['login'];
        $check1 = myPDO:: get_data("SELECT key_user FROM users where login = ?", [$login],true);
       myPDO:: set_data("DELETE FROM pictures WHERE id = :id AND key_user = :key_user",array('id' => $data,'key_user' => $check1[0]));
    }

}
