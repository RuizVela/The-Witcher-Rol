<?php

class Personaje 
{
    function __construct($caracteristicas)
    {
        $this->caracteristicas=$caracteristicas;
        $this->setAguYPv();
        $this->setAtu();
    }
    private $caracteristicas;
    private $agu;
    private $pv;
    private $atu;

    private function calcularFisico()
    {
        $suma = $this->caracteristicas['tco']+$this->caracteristicas['vol'];
        $media = floor($suma/2);
        return $media;
    }
    public function setAguYPv()
    {
        //TODO: cambiar public a private
        $fisico = $this->calcularFisico();
        $value = $fisico*5;
        $this->agu=$value;
        $this->pv=$value;
    }
    public function setAtu()
    {
        //TODO: cambiar public a private
        $fisico = $this->calcularFisico();
        if ($fisico>10)
        {
            $this->atu=10;
            return;
        }
        $this->atu=$fisico;
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
    public function getAtu()
    {
        return $this->atu;
    }
}