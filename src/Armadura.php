<?php
namespace src;

class Armadura
{
    function __construct($armadura)
    {
        $this->cp = $armadura['cp'];
        $this->ve = $armadura['ve'];
        $this->localizacion = $armadura['localizacion'];
    }
    public $cp;
    private $ve;
    private $localizacion;
}