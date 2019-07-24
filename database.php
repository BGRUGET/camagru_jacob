<?php


//utiliser docker ps
//chopper ip du dernier container (mysql)
//docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' <IP CONTAINEUR>
// ex : mysql:host=172.18.0.2

/*
try
{
    $database = new PDO('mysql:host=mysql;dbname=Camagru;charset=utf8', 'root', 'rootpass',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}
*/


class myPDO
{
    private static $database;
    private static $db_name = NULL;
    private static $db_host = NULL;
    private static $db_username = NULL;
    private static $db_pass = NULL;

    private function __construct($db_name, $host, $user_name, $user_pass){
        self::$db_name = $db_name;
        self::$db_host = $host;
        self::$db_username = $user_name;
        self::$db_pass = $user_pass;
    }

    static function init_db($db_name, $host, $user_name, $user_pass){
        try {
          if (self::$database === NULL) // first DB CONNEXION Else already done
            {
                $init = new myPDO($db_name, $host, $user_name, $user_pass);
                self::$database = new PDO('mysql:host=' . self::$db_host . ';dbname=' . self::$db_name . ';charset=utf8', self::$db_username, self::$db_pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

            }
        } catch (Exception $error) {
            die('Erreur: ' . $error->getMessage());
        }
    }

    static public function getdb(){
        if (self::$database === NULL) // si il ny a pas de connection entre la database
        {
            print("ccojdobhdiobdhjobjdfbdfbdf");
            static::init_db("Camagru", "mysql", "root", "rootpass");
        }
        return (self::$database);
    }

    static public function get_data($req, $tab, $nb_req = false){
        try {
            $data = self::getdb()->prepare($req);
            $data->execute($tab);
            if ($nb_req == true)
                $new_data = $data->fetch();
            else
                $new_data = $data->fetchALL();
            return ($new_data);
        } catch (Exception $error) {
            die('Erreur CONNEXION BDD: ' . $error->getMessage());
        }
    }

    static public function Set_data($req, $tab){
        try {
            $data = self::getdb()->prepare($req);
            return ($data->execute($tab));

        } catch (Exception $error) {
            die('Erreur CONNEXION BDD: ' . $error->getMessage());
        }
    }
}
?>

