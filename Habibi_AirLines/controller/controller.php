<?php
/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 10:21
 */


$action = $_REQUEST["action"];

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
        require "../views/client_liste.php";
        break;

    case "client_ajout" :
        include "../models/Connection.php";
        if(isset($_REQUEST["email"]))
        {
            $db = Connection::getInstance();
            $conn = $db->getDbh();
            $reponse = $conn->exec('INSERT INTO CLIENT (NOM, PRENOM, EMAIL) VALUES ("'.$_REQUEST['nom'].'","'.$_REQUEST['prenom'].'","'.$_REQUEST['email'].'")');

            if($reponse == 1)
            {
                $res = "OK";
            }
            else $res = "NOK";
        }
        require "../views/client_ajout.php";
        break;

    case "catalogue" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare('SELECT DISTINCT VOL_G.`NUM_AERO`, a1.NOM_AERO, a1.VILLE , `NUM_AERO_ARRIVEE`, a2.NOM_AERO, a2.VILLE FROM vol_g LEFT JOIN AEROPORT AS a1 ON VOL_G.NUM_AERO = a1.NUM_AERO LEFT JOIN AEROPORT AS a2 ON VOL_G.NUM_AERO_ARRIVEE = a2.NUM_AERO');
        $sql->execute();
        $data = $sql->fetchAll();
        require "../views/catalogue_vol.php";
        break;

    case "detail" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare('SELECT * FROM VOL_G WHERE NUM_AERO = "'.$_REQUEST['d'].'" AND NUM_AERO_ARRIVEE = "'.$_REQUEST['a'].'"');
        $sql->execute();
        $data = $sql->fetchAll();
        require "../views/detail_vol.php";
        break;

    case "dispo" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare('SELECT v.`NUM_VOL`,`DATE_DEPART`,`DATE_ARRIVEE`, vg.HEURE_DEPART, vg.HEURE_ARRIVEE, ae.NUM_AERO, ae.NOM_AERO, ae.VILLE, ae2.NUM_AERO, ae2.NOM_AERO, ae2.VILLE, vg.NBR_PLACES
                                FROM VOL v
                                LEFT JOIN VOL_G vg ON v.NUM_VOL = vg.NUM_VOL
                                LEFT JOIN AEROPORT ae ON vg.NUM_AERO = ae.NUM_AERO
                                LEFT JOIN AEROPORT ae2 ON vg.NUM_AERO_ARRIVEE = ae2.NUM_AERO
                                WHERE v.NUM_VOL = "'.$_REQUEST["num"].'"');
        $sql->execute();
        $data = $sql->fetchAll();
        require "../views/dispo_vol.php";
        break;

    case "reservation" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare('SELECT a1.VILLE, a1.NOM_AERO, a2.VILLE, a2.NOM_AERO
                                FROM VOL_G v
                                JOIN AEROPORT a1 ON v.NUM_AERO = a1.NUM_AERO
                                JOIN AEROPORT a2 ON v.NUM_AERO_ARRIVEE = a2.NUM_AERO
                                WHERE NUM_VOL = "'.$_REQUEST["num"].'"');
        $sql->execute();
        $data = $sql->fetchAll();
        require "../views/resa_vol.php";
        break;

    case "result" :
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare("SELECT NUM_CLIENT FROM CLIENT WHERE EMAIL = '".$_REQUEST["email"]."'");
        $sql->execute();
        $id = $sql->fetchAll()[0][0];
        if(!empty($id)) {
            $sql = $conn->prepare('SELECT MAX(NUM_RESA)+1 FROM RESERVATION');
            $sql->execute();
            $num_resa = $sql->fetchAll()[0][0];

            $dateNow = (new \DateTime())->format('Ymd');
            $reponse = $conn->exec("INSERT INTO `RESERVATION` (`ID_AGENCE`, `NUM_RESA`, `NUM_CLIENT`, `NUM_VOL`, `DATE_DEPART`, `DATE_RESA`, `NBR_PLACE`) VALUES (1, " . $num_resa . ", " . $id . ", '" . $_REQUEST["num_vol"] . "', " . $_REQUEST["date"] . ", $dateNow, " . $_REQUEST["place"] . ")");
            if($reponse == 1)
            {
                $res = "OK";
            }
            else $res = "NOK";
        }
        else $res = "ENOK";
        include "../views/result_resa.php";
        break;

    case "liste_reservation" :
        //SELECT * FROM RESERVATION GROUP BY NUM_VOL, DATE_DEPART
        include "../models/Connection.php";
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare("SELECT r.NUM_VOL, r.DATE_DEPART, a.NOM_AERO, a.VILLE, a.NUM_AERO, a2.NOM_AERO, a2.VILLE, a2.NUM_AERO
                                FROM RESERVATION r
                                LEFT JOIN VOL_G v ON r.NUM_VOL = v.NUM_VOL
                                LEFT JOIN AEROPORT a ON v.NUM_AERO = a.NUM_AERO
                                LEFT JOIN AEROPORT a2 ON v.NUM_AERO_ARRIVEE = a2.NUM_AERO
                                GROUP BY NUM_VOL, DATE_DEPART");
        $sql->execute();
        $data = $sql->fetchAll();

        include "../views/reservation.php";
        break;

    case "reservation_detail" :
        include "../models/Connection.php";
        $dateQ = DateTime::createFromFormat('Y-m-d', $_REQUEST["date"])->format('Ymd');
        $db = Connection::getInstance();
        $conn = $db->getDbh();
        $sql = $conn->prepare('SELECT c.NUM_CLIENT, c.NOM, c.PRENOM, c.EMAIL, r.NBR_PLACE, r.NUM_RESA, a.NUM_AERO, a.NOM_AERO, a.VILLE, a2.NUM_AERO, a2.NOM_AERO, a2.VILLE, v.HEURE_DEPART, v.HEURE_ARRIVEE, z.DATE_ARRIVEE
                                FROM `RESERVATION` r
                                JOIN CLIENT c ON c.NUM_CLIENT = r.NUM_CLIENT
                                JOIN VOL_G v ON v.NUM_VOL = r.NUM_VOL
                                JOIN AEROPORT a ON v.NUM_AERO = a.NUM_AERO
                                JOIN AEROPORT a2 ON v.NUM_AERO_ARRIVEE = a2.NUM_AERO
                                JOIN VOL z ON v.NUM_VOL = z.NUM_VOL AND z.DATE_DEPART = '.$dateQ.'
                                WHERE r.NUM_VOL = "'.$_REQUEST["num"].'"
                                AND r.DATE_DEPART = '.$dateQ);
        $sql->execute();
        $data = $sql->fetchAll();

        include "../views/reservation_detail.php";
        break;

    case "pdf" :

        include "../views/PDF.php";
        break;




}


