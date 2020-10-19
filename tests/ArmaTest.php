<?php 
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Arma.php";

class ArmaTest extends TestCase
{
    public function test_dañar_devuelve_un_entero()
    {
        $arma = array('habilidad'=>'espada','precision'=>0,'daño'=>[2,2],'fiabilidad'=>10, 'caracteristica'=>'ref');
        $espada = new Arma($arma);
        $daño = $espada->dañar();
        $this->assertIsInt($daño);
    }
}