<?php

class Personaje 
{
    function __construct($caracteristicas)
    {
        $this->caracteristicas=$caracteristicas;
        $this->setAguYPv();
        $this->setAtu();
        $this->setRec();
    }
    private $caracteristicas;
    private $agu;
    private $pv;
    private $atu;
    private $rec;

    private function calcularFisico()
    {
        $suma = $this->caracteristicas['tco']+$this->caracteristicas['vol'];
        $media = floor($suma/2);
        return $media;
    }
    private function setAguYPv()
    {
        $fisico = $this->calcularFisico();
        $value = $fisico*5;
        $this->agu=$value;
        $this->pv=$value;
    }
    private function setAtu()
    {
        $fisico = $this->calcularFisico();
        if ($fisico>10)
        {
            $this->atu=10;
            return;
        }
        $this->atu=$fisico;
    }
    private function setRec()
    {
        $fisico = $this->calcularFisico();
        $this->rec=$fisico;
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
    public function getRec()
    {
        return $this->rec;
    }
}