<?php

class Personaje 
{
    function __construct($caracteristicas)
    {
        $this->caracteristicas=$caracteristicas;
        $this->setAgu();
    }
    private $caracteristicas;
    private $agu;

    public function setAgu()
    {
        $agu = $this->caracteristicas['tco']+$this->caracteristicas['vol'];
        $agu = floor($agu/2);
        $agu = $agu*5;
        $this->agu=$agu;
        
    }
    public function getCaracteristica($caracteristica)
    {
        return $this->caracteristicas[$caracteristica];
    }
    public function getAgu()
    {
        return $this->agu;
    }
}