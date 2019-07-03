<?php

/*class Database{


    private $db_dsn = 'mysql:host=172.18.0.2;dbname=Camagru;charset=utf8';
    private $db_user = 'root';
    private $db_pass = 'rootpass' ;
    private $db_option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    private $pdo;

    public function __construct($db_dsn, $db_user, $db_pass, $db_option){
        $this->db_dsn = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_option = $db_option;
    }

    private function getPDO(){
        $pdo = new PDO('mysql:host=172.18.0.2;dbname=Camagru;charset=utf8', 'root', 'rootpass'
        $pdo->setattribute(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo;
        return $pdo;
    }


    public function query($statement){
        $this->getPDO;

    }
}
*/
//utiliser docker ps
//chopper ip du dernier container (mysql)
//docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' <IP CONTAINEUR>
// ex : mysql:host=172.18.0.2

try
{
    $database = new PDO('mysql:host=mysql;dbname=Camagru;charset=utf8', 'root', 'rootpass',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
    die('Erreur: ' . $e->getMessage());
}


?>