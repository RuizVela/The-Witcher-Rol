<?php 
require __DIR__ . "/../src/Personaje.php";
require __DIR__ . "/../src/PersonajeController.php";
$personaje = PersonajeController::abrir($_POST['personaje']);
foreach( array_keys($personaje->getCaracteristicas()) as $caracteristica)
{   echo $caracteristica;
    echo $personaje->getCaracteristica($caracteristica)."<br />";
}
foreach( array_keys($personaje->getCaracteristicasDerivadas()) as $caracteristica)
{   echo $caracteristica;
    echo $personaje->getCaracteristicaDerivada($caracteristica)."<br />";
}