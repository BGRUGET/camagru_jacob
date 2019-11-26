<?php


class commentlike
{
    static public function get_image_home($id)
    {

        return myPDO:: get_data("SELECT content FROM `pictures` WHERE id_unique =? ", [$id], true);
    }
    static public function post_comment($login, $id, $comment)
    {
        $mois = date("m-d");
        $heure =  date("H:i");
        $com = (htmlspecialchars(addslashes($comment)));

        $key_user = myPDO:: get_data("SELECT key_user FROM `pictures` WHERE id_unique =? ", [$id], true);
        $mail = myPDO:: get_data("SELECT mail FROM `users` WHERE key_user =? ", [$key_user[0]], true);

        $receiver = myPDO:: get_data("SELECT login, notif FROM `users` WHERE mail =? ", [$mail[0]], true);

       myPDO::set_data("INSERT INTO commentaire VALUE('','', :commentaire, :login, :picture_id, :mois, :heure)", array("login" => $login, "commentaire" => $com,"picture_id" => $id, "mois" => $mois, "heure" => $heure));
       $date = myPDO:: get_data("SELECT mois, heure FROM `commentaire` WHERE picture_id =? ", [$id], true);
       if ($receiver[1] == '1') {
            Mymail::mail_comment($receiver[0], $mail[0], $login, $comment, $date[0], $date[1]);
        }
        //header("Location: /post.php?id=".$_GET['id']);
    }
}