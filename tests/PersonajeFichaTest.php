<?php 
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/PersonajeFicha.php";
require __DIR__ . "/../src/PersonajeFichaController.php";

class PersonajeFichaTest extends TestCase
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
    
    private $personajeFicha;
    public function setUp() :void
    {
        parent::setUp();
        $this->personajeFicha = new PersonajeFicha($this->nombre, $this->caracteristicas, $this->habilidades);
    }
    public function test_constructor_de_caracteristicas_funciona()
    {

        $this->assertEquals($this->personajeFicha->getCaracteristica('int'),$this->caracteristicas['int']);
    }

    public function test_setAgu_funciona()
    {
        $agu=55;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('agu'),$agu);
    }
    public function test_setPv_funciona()
    {
        $pv=55;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('pv'),$pv);
    }
    public function test_setAtu_funciona()
    {
        $atu = 10;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('atu'),$atu);
    }
    public function test_setRec_funciona()
    {
        $rec=11;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('rec'),$rec);
    }
    public function test_setCarr_funciona()
    {
        $carr=6;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('carr'),$carr);
    }
    public function test_setSal_funciona()
    {
        $sal=1;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('sal'),$sal);
    }
    public function test_setEst_funciona()
    {
        $est=100;
        $this->assertEquals($this->personajeFicha->getCaracteristicaDerivada('est'),$est);
    }
    public function test_guardar_hoja_de_personaje()
    {
        PersonajeFichaController::crear($this->personajeFicha);
        $file = $this->nombre.'.json';
        $personaje_json = json_decode(file_get_contents($file));
        $file_writed = $personaje_json->nombre == $this->nombre;
        $this->assertTrue($file_writed);
        unlink($file);
    }
    public function test_abrir_hoja_de_personaje()
    {   
        PersonajeFichaController::crear($this->personajeFicha);
        $file = $this->nombre.'.json';
        $personajeFicha = PersonajeFichaController::abrir($file);
        $this->assertEquals($personajeFicha,$this->personajeFicha);
        unlink($file);
    }
}