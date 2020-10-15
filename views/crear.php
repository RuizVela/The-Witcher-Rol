<?php 
require __DIR__ . "/../src/PersonajeFicha.php";
require __DIR__ . "/../src/PersonajeFichaController.php";
$personajeFicha = new PersonajeFicha($_POST['nombre'],$_POST['caracteristicas'],$_POST['habilidades']);
PersonajeFichaController::crear($personajeFicha);
header("Location: home.html");
die;


