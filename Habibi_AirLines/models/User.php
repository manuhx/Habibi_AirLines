<?php

/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 10:18
 */

class User
{
    private $nom;
    private $prenom;
    private $mail;
    private $agence;
    private $login;

    /**
     * User constructor.
     * @param string $nom
     * @param string $prenom
     */
    public function __construct($nom, $prenom, $mail, $agence, $login)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->agence = $agence;
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getAgence()
    {
        return $this->agence;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }


    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }


    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }




}