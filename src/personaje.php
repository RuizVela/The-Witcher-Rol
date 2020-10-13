<?php

class Personaje 
{
    function __construct($caracteristicas)
    {
        $this->caracteristicas=$caracteristicas;
    }
    private $caracteristicas;

    public function getCaracteristica($caracteristica)
    {
        return $this->caracteristicas[$caracteristica];
    }
}