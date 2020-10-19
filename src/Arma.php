<?php

class Arma
{
    function __construct($arma)
    {
        $this->nombre = $arma['nombre'];
        $this->habilidad = $arma['habilidad'];
        $this->caracteristica = $arma['caracteristica'];
        $this->precision = $arma['precision'];
        $this->daño = $arma['daño'];
        $this->fiabilidad = $arma['fiabilidad'];
    }
    private $nombre;
    private $habilidad;
    private $caracteristica;
    private $precision;
    private $daño;
    public $fiabilidad;

    public function dañar()
    {
        $daño=0;
        for($i=0; $i<$this->daño[0];$i++)
        {
            $daño+=rand(1,6);
        }
        $daño+=$this->daño[1];
        return $daño;
    }
    public function getHabilidad()
    {
        return $this->habilidad;
    }
    public function getCaracteristica()
    {
        return $this->caracteristica;
    }
    public function getPrecision()
    {
        return $this->precision;
    }
}