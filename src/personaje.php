<?php

class Personaje 
{
    function __construct($caracteristicas)
    {
        $this->caracteristicas=$caracteristicas;
        $this->setAguYPv();
    }
    private $caracteristicas;
    private $agu;
    private $pv;

    public function setAguYPv()
    {
        $suma = $this->caracteristicas['tco']+$this->caracteristicas['vol'];
        $media = floor($suma/2);
        $value = $media*5;
        $this->agu=$value;
        $this->pv=$value;
    }
    public function getCaracteristica($caracteristica)
    {
        return $this->caracteristicas[$caracteristica];
    }
    public function getAgu()
    {
        return $this->agu;
    }
    public function getPv()
    {
        return $this->pv;
    }
}