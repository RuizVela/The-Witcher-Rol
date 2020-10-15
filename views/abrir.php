<?php 
require __DIR__ . "/../src/PersonajeFicha.php";
require __DIR__ . "/../src/PersonajeFichaController.php";
$personajeFicha = PersonajeFichaController::abrir($_POST['personajeFicha']);
foreach( array_keys($personajeFicha->getCaracteristicas()) as $caracteristica)
{   echo $caracteristica;
    echo $personajeFicha->getCaracteristica($caracteristica)."<br />";
}
foreach( array_keys($personajeFicha->getCaracteristicasDerivadas()) as $caracteristica)
{   echo $caracteristica;
    echo $personajeFicha->getCaracteristicaDerivada($caracteristica)."<br />";
}