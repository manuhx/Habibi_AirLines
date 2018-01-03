<?php

/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 14:43
 */
class Connection
{
    private static $instance;
    private $type = "mysql";
    private $host = "localhost";
    private $dbname = "agence";
    private $username = "admin";
    private $password = 'admin';
    private $dbh;

    private function __construct()
    {
        try{
            $this->dbh = new PDO(
                $this->type.':host='.$this->host.'; dbname='.$this->dbname,
                $this->username,
                $this->password,
                array(PDO::ATTR_PERSISTENT => true)
            );

            $req = "SET NAMES UTF8";
            $result = $this->dbh->prepare($req);
            $result->execute();
        }
        catch(PDOException $e){
            echo '<div class="\"error\"">Erreur !: ".$e->getMessage()."</div>';
            die();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getDbh()
    {
        return $this->dbh;
    }

    public function addClient($nom, $prenom, $email)
    {
        $conn = $this->dbh;
        $reponse = $conn->exec('INSERT INTO client (nom, prenom, email) VALUES ("'.$nom.'","'.$prenom.'","'.$email.'")');
        if($reponse == 1)
        {
            return true;
        }
        else return false;
    }

}