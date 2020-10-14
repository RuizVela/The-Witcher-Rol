<?php

class PersonajeController
{
    static function crear($personaje)
    {
            $json_string = json_encode($personaje);
            $file = $personaje['nombre'].'.json';
            file_put_contents($file,$json_string);
    }
}