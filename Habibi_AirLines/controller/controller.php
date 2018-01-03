<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 10:21
 */


$action = $_REQUEST["action"];
echo $_REQUEST["email"];
echo ('INSERT INTO client (nom, prenom, email) VALUES ("'.$_REQUEST['nom'].'","'.$_REQUEST['prenom'].'","'.$_REQUEST['email'].'")');

switch($action)
{
    case "account" :
        include "../models/User.php";
        $user = new User("VERRON", "Manuel", "toto@gmail.com", "Agence de Paris", "manuhx");
        require "../views/account.php";
        break;

    case "acceuil" :
        include "../views/acceuil.php";
        break;

    case "client_liste" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare("SELECT * FROM client");
        $sql->execute();
        $data = $sql->fetchAll();
        if(isset($_REQUEST["email"]))
        {
            echo "test";
            $reponse = $sql->exec('INSERT INTO CLIENT (NOM, PRENOM, EMAIL) VALUES ("'.$_REQUEST['nom'].'","'.$_REQUEST['prenom'].'","'.$_REQUEST['email'].'")');
            if($reponse == 1)
            {
                $res = "OK";
            }
            else $res = "NOK";
        }

        require "../views/client_liste.php";
        break;

    case "client_ajout" :
        /*include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare("SELECT * FROM client");
        $sql->execute();
        $data = $sql->fetchAll();*/
        require "../views/client_ajout.php";
        break;


}


