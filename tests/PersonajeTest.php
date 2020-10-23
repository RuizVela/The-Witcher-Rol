<?php
namespace src;

use IPersonaje;
use PHPUnit\Framework\TestCase;


class PersonajeTest extends TestCase implements IPersonaje
{    
    private $nombre = 'Geralt de Rivia';
    private $caracteristicas = array(
        'int'=>6,
        'ref'=>5,
        'des'=>7,
        'tco'=>10,
        'mov'=>2,
        'emp'=>9,
        'tec'=>2,
        'vol'=>13,
        'sue'=>4
    );
    private $habilidades = array(
        'int'=>array('advertir'=>1, 'callejeo'=>2),
        'ref'=>array('pelea'=>6, 'esquivar'=>6),
        'des'=>array(),
        'tco'=>array(),
        'emp'=>array(),
        'tec'=>array(),
        'vol'=>array()
    );
    
    private $personaje;

    function lanzarDado()
    {
        return 10;
    }
    function comprobarResultado($dado)
    {
        $resultado = $dado;
        while($dado==10)
        {
            $dado = 6;
            $resultado += $dado;
        }
        return $resultado;
    }
    public function setUp() :void
    {
        parent::setUp();
        $this->personaje = new $this($this->nombre, $this->caracteristicas, $this->habilidades);
    }
    public function test_lanzar_dado_vuelve_a_lanzar_si_saca_10()
    {
        $dado = $this->personaje->lanzarDado();
        $resultado = $this->personaje->comprobarResultado($dado);
        $expected = 16;
        $this->assertEquals($expected, $resultado);
    }
}