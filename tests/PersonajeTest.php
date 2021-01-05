<?php
use PHPUnit\Framework\TestCase;
use src\Personaje;

class PersonajeTest extends TestCase
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
        'ref'=>array('espada'=>6, 'esquivar'=>6),
        'des'=>array(),
        'tco'=>array(),
        'emp'=>array(),
        'tec'=>array(),
        'vol'=>array()
    );
    private $arma = array('nombre'=>'Espada de Acero','habilidad'=>'espada','precision'=>0,'daño'=>[2,2],'fiabilidad'=>10, 'caracteristica'=>'ref');
    private $personaje;

    public function setUp() :void
    {
        parent::setUp();
        $this->personaje = new Personaje($this->nombre, $this->caracteristicas, $this->habilidades);
    }

    public function test_atacar_devuelve_un_entero()
    {

        $ataque = $this->personaje->atacar($this->arma);
        $expected = 11;
        $this->assertEquals($ataque, $expected);
    }
    public function test_esquivar_devuelve_un_entero()
    {       
        $ataque = $this->personaje->atacar($this->arma);
        $esquivar = $this->personaje->esquivar($ataque);
        $expected = 0;
        $this->assertEquals($esquivar,$expected);
    }
}