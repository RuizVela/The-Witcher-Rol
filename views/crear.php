<?php 
require __DIR__ . "/../src/Personaje.php";
require __DIR__ . "/../src/PersonajeController.php";
$personaje = new Personaje($_POST['nombre'],$_POST['caracteristicas'],$_POST['habilidades']);
PersonajeController::crear($personaje);
header("Location: home.html");
die;


