<?php
namespace src;

use JsonSerializable;

class PersonajeFicha implements JsonSerializable 
{
    function __construct($nombre,$caracteristicas,$habilidades)
    {
        $this->nombre = $nombre;
        $this->caracteristicas=$caracteristicas;
        $this->setCaracteristicasDerivadas();
        $this->habilidades = $habilidades;

    }
    private $nombre;
    private $caracteristicas;
    private $caracteristicasDerivadas;
    private $habilidades;
    private $dañoAdicional;

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }

    private function setCaracteristicasDerivadas()
    {
        $this->setAguYPv();
        $this->setAtu();
        $this->setRec();
        $this->setCarr();
        $this->setSal();
        $this->setEst();
        $this->setDañoAdicional();
    }
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
        $this->caracteristicasDerivadas['agu']=$value;
        $this->caracteristicasDerivadas['pv']=$value;
    }
    private function setAtu()
    {
        $fisico = $this->calcularFisico();
        if ($fisico>10)
        {
            $this->caracteristicasDerivadas['atu']=10;
            return;
        }
        $this->caracteristicasDerivadas['atu']=$fisico;
    }
    private function setRec()
    {
        $fisico = $this->calcularFisico();
        $this->caracteristicasDerivadas['rec']=$fisico;
    }
    private function setCarr()
    {
        $carr=$this->caracteristicas['mov']*3;
        $this->caracteristicasDerivadas['carr']=$carr;
    }
    private function setSal()
    {
        $sal = floor($this->caracteristicasDerivadas['carr']/5);
        $this->caracteristicasDerivadas['sal']=$sal;
    }
    private function setEst()
    {
        $est = $this->caracteristicas['tco']*10;
        $this->caracteristicasDerivadas['est']=$est;
    }
    private function setDañoAdicional()
    {
        $valor = $this->caracteristicas['tco'] -5;
        if ($valor%2!=0)
        {   
            $this->dañoAdicional = $valor-1;
            return;
        }
        $this->dañoAdicional = $valor;
    }
    public function getCaracteristicas()
    {
        return $this->caracteristicas;
    }
    public function getCaracteristicasDerivadas()
    {
        return $this->caracteristicasDerivadas;
    }
    public function getCaracteristica($caracteristica)
    {
        return $this->caracteristicas[$caracteristica];
    }
    public function getCaracteristicaDerivada($derivada)
    {
        return $this->caracteristicasDerivadas[$derivada];
    }
    public function getDañoAdicional()
    {
        return $this->dañoAdicional;
    }
    public function getHabilidades()
    {
        return $this->habilidades;
    }
    public function getHabilidad($habilidad)
    {
        foreach($this->habilidades as $grupo)
        {
            if(key_exists($habilidad,$grupo))
            return $grupo[$habilidad];
        }
    }
}