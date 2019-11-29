<?php


class Profil
{
    static public function get_profil($form)
    {
        $login = $_SESSION['login'];
        $get_data = myPDO::get_data("SELECT " . $form . " FROM users WHERE login = ? ", [$login], true);
        if ($form == 'notif') {
            if ($get_data[0] !== '1')
                return '';
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
                if ($column == 'mail') {
                    $check_mail = myPDO::get_data("SELECT COUNT(*) FROM users WHERE mail = ? ", [$form], true);
                    if ($check_mail[0] > 0) {
                        echo 'mail already use';
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
        $check = (htmlspecialchars(addslashes($check)));
        $login = $_SESSION['login'];

       if (!empty($check))
            $check = '1';
        else
            $check = '0';
        myPDO::set_data("UPDATE users SET notif = :notif WHERE login = :login", array("login" => $login, "notif" => $check));
    }


   /* static public function dl_pic($pic)
    {
        $login = $_SESSION['login'];

        $target_dir = "img/pics";
       if(!file_exists($target_dir))
        {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($pic["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (!empty($pic['tmp_name']))
            $check = getimagesize($pic["tmp_name"]);
        else
            $check = NULL;
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        /* Check file size
        if ($pic["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }*/
        // Allow certain file formats
       /* if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return;
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($pic["tmp_name"], $target_file)) {
                echo "The file " . basename($pic["name"]) . " has been uploaded.";

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        myPDO::set_data("UPDATE users SET pic = :pic WHERE login = :login", array("login" => $login, "pic" => $target_file));*/

    static public function dl_pic($pic)
    {
// Constantes
        $login = $_SESSION['login'];

        define('MAX_SIZE', 100000);    // Taille max en octets du fichier
        define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
        define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels

// Tableaux de donnees
        $tabExt = array('jpg', 'gif', 'png', 'jpeg');    // Extensions autorisees
        $infosImg = array();

// Variables
        $extension = '';
        $message = '';
        $nomImage = '';

        /************************************************************
         * Creation du repertoire cible si inexistant
         *************************************************************/
        $target_dir = "img/pics/";
        if(!file_exists($target_dir))
        {
            mkdir($target_dir);
        }
      /* if (!mkdir($target_dir,755)
            exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
        */
        $target_file = $target_dir . $pic["name"];


        /************************************************************
         * Script d'upload
         *************************************************************/
        /* if(!empty($_POST))
         {
             // On verifie si le champ est rempli
             if( !empty($pic['name']) )
             {*/
        // Recuperation de l'extension du fichier
        $extension = pathinfo($pic['name'], PATHINFO_EXTENSION);

        // On verifie l'extension du fichier
        if (in_array(strtolower($extension), $tabExt)) {
            // On recupere les dimensions du fichier
            $infosImg = getimagesize($pic['tmp_name']);

            // On verifie le type de l'image
            if ($infosImg[2] >= 1 && $infosImg[2] <= 14) {
                // On verifie les dimensions et taille de l'image
                if (($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($pic['tmp_name']) <= MAX_SIZE)) {
                    // Parcours du tableau d'erreurs
                    if (isset($pic['error'])
                        && UPLOAD_ERR_OK === $pic['error']) {
                        // On renomme le fichier
                        $nomImage = md5(uniqid()) . '.' . $extension;

                        // Si c'est OK, on teste l'upload

                        if (move_uploaded_file($pic['tmp_name'], $target_dir.'/'. $nomImage)) {
                            $message = 'Upload réussi !';
                        } else {
                            // Sinon on affiche une erreur systeme
                            $message = 'Problème lors de l\'upload !';
                        }
                    } else {
                        $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
                    }
                } else {
                    // Sinon erreur sur les dimensions et taille de l'image
                    $message = 'Erreur dans les dimensions de l\'image !';
                }
            } else {
                // Sinon erreur sur le type de l'image
                $message = 'Le fichier à uploader n\'est pas une image !';
            }
        } else {
            // Sinon on affiche une erreur pour l'extension
            $message = 'L\'extension du fichier est incorrecte !';
        }

            myPDO::set_data("UPDATE users SET pic = :pic WHERE login = :login", array("login" => $login, "pic" => $target_dir.'/'. $nomImage));
    }
}

?>
