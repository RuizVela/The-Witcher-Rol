<?php
namespace src;

class Personaje extends PersonajeFicha
{
    public function atacar($arma)
    {
        $habilidad = $this->getHabilidad($arma['habilidad']);
        $caracteristica = $this->getCaracteristica($arma['caracteristica']);
        $precision = $arma['precision'];
        $ataque = $habilidad+$caracteristica+$precision;
        //TODO: Sumar dado a parte.
        return $ataque;
    }
    public function esquivar($ataque)
    {
        $esquiva = $this->getHabilidad('esquivar')+$this->getCaracteristica('ref');
        $diferencia = $ataque - $esquiva;
        //TODO: Sumar dado a parte.
        return $diferencia;
    }
}