<?php 
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Personaje.php";
require __DIR__ . "/../src/PersonajeController.php";

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
    private $personaje;
    public function setUp() :void
    {
        parent::setUp();
        $this->personaje = new Personaje($this->nombre, $this->caracteristicas);
    }
    public function test_constructor_de_caracteristicas_funciona()
    {

        $this->assertEquals($this->personaje->getCaracteristica('int'),$this->caracteristicas['int']);
    }

    public function test_setAgu_funciona()
    {
        $agu=55;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('agu'),$agu);
    }
    public function test_setPv_funciona()
    {
        $pv=55;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('pv'),$pv);
    }
    public function test_setAtu_funciona()
    {
        $atu = 10;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('atu'),$atu);
    }
    public function test_setRec_funciona()
    {
        $rec=11;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('rec'),$rec);
    }
    public function test_setCarr_funciona()
    {
        $carr=6;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('carr'),$carr);
    }
    public function test_setSal_funciona()
    {
        $sal=1;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('sal'),$sal);
    }
    public function test_setEst_funciona()
    {
        $est=100;
        $this->assertEquals($this->personaje->getCaracteristicaDerivada('est'),$est);
    }
    public function test_guardar_personaje()
    {
        $vars = $this->personaje->jsonSerialize();
        PersonajeController::crear($vars);
        $file = $this->nombre.'.json';
        $personaje_json = json_decode(file_get_contents($file));
        $file_writed = $personaje_json->nombre == $this->nombre;
        $this->assertTrue($file_writed);
        unlink($file);
    }
}