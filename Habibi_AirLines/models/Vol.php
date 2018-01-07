<?php

/**
 * Created by PhpStorm.
 * User: hx
 * Date: 05/01/2018
 * Time: 08:26
 */
class Vol
{
    private $aeroD;
    private $aeroA;
    private $jour;
    private $heureD;
    private $heureA;
    private $nbrPlaces;
    private $numVol;
    private $dateD;
    private $dateA;

    /**
     * Vol constructor.
     * @param $aeroD
     * @param $aeroA
     * @param $jour
     * @param $heureD
     * @param $heureA
     * @param $nbrPlaces
     * @param $numVol
     * @param $dateD
     * @param $dateA
     */
    public function __construct($aeroD, $aeroA, $jour, $heureD, $heureA, $nbrPlaces, $numVol, $dateD, $dateA)
    {
        $this->aeroD = $aeroD;
        $this->aeroA = $aeroA;
        $this->jour = $jour;
        $this->heureD = $heureD;
        $this->heureA = $heureA;
        $this->nbrPlaces = $nbrPlaces;
        $this->numVol = $numVol;
        $this->dateD = $dateD;
        $this->dateA = $dateA;
    }

    /**
     * @return mixed
     */
    public function getAeroD()
    {
        return $this->aeroD;
    }

    /**
     * @return mixed
     */
    public function getAeroA()
    {
        return $this->aeroA;
    }

    /**
     * @return mixed
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * @return mixed
     */
    public function getHeureD()
    {
        return $this->heureD;
    }

    /**
     * @return mixed
     */
    public function getHeureA()
    {
        return $this->heureA;
    }

    /**
     * @return mixed
     */
    public function getNbrPlaces()
    {
        return $this->nbrPlaces;
    }

    /**
     * @return mixed
     */
    public function getNumVol()
    {
        return $this->numVol;
    }

    /**
     * @return mixed
     */
    public function getDateD()
    {
        return $this->dateD;
    }

    /**
     * @return mixed
     */
    public function getDateA()
    {
        return $this->dateA;
    }




}