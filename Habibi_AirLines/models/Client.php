<?php

/**
 * Created by PhpStorm.
 * User: hx
 * Date: 03/01/2018
 * Time: 14:34
 */
class Client
{
    private $numClient;
    private $nom;
    private $prenom;
    private $mail;

    /**
     * Client constructor.
     * @param $numClient
     * @param $nom
     * @param $prenom
     * @param $mail
     */

    public function __construct($numClient, $nom, $prenom, $mail)
    {
        $this->numClient = $numClient;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
    }


    /**
     * @return mixed
     */
    public function getNumClient()
    {
        return $this->numClient;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }



}