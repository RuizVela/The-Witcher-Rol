<?php 
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Personaje.php";

class PersonajeTest extends TestCase
{
    public function test_constructor_de_caracteristicas_funciona()
    {
        $caracteristicas = array(
            'int'=>6,
            'ref'=>5,
            'des'=>7,
            'tco'=>8,
            'mov'=>1,
            'emp'=>9,
            'tec'=>2,
            'vol'=>3,
            'sue'=>4
        );
        $personaje = new Personaje($caracteristicas);
        $this->assertEquals($personaje->getCaracteristica('int'),$caracteristicas['int']);
    }
}