<?php 
use PHPUnit\Framework\TestCase;
use src\Arma;

class ArmaTest extends TestCase
{
    public function test_dañar_devuelve_un_entero()
    {
        $arma = array('nombre'=>'Espada de Acero','habilidad'=>'espada','precision'=>0,'daño'=>[2,2],'fiabilidad'=>10, 'caracteristica'=>'ref');
        $espada = new Arma($arma);
        $daño = $espada->dañar();
        $this->assertIsInt($daño);
    }
}