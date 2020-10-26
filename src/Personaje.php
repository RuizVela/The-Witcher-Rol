<?php
namespace src;

use IPersonaje;

class Personaje extends PersonajeFicha implements IPersonaje
{

    public function lanzarDado()
    {
        $dado = rand(1,10);
        return $dado;
    }
    public function comprobarResultado($dado)
    {
        $resultado = $dado;
        while($dado==10)
        {
            $dado = $this->lanzarDado();
            $resultado += $dado;
        }
        return $resultado;
    }
    public function atacar($arma)
    {
        $habilidad = $this->getHabilidad($arma['habilidad']);
        $caracteristica = $this->getCaracteristica($arma['caracteristica']);
        $precision = $arma['precision'];
        $ataque = $habilidad+$caracteristica+$precision;
        //TODO: Sumar dado a parte.
        return $ataque;
    }
}