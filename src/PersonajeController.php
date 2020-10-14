<?php

class PersonajeController
{
    static function crear($personaje)
    {
            $vars = $personaje->jsonSerialize();
            $json_string = json_encode($vars);
            $file = $vars['nombre'].'.json';
            file_put_contents($file,$json_string);
    }
    static function abrir($file)
    {
       $personaje_json = json_decode(file_get_contents($file));
       $caracteristicas = json_decode(json_encode($personaje_json->caracteristicas), true);
       $personaje = new Personaje($personaje_json->nombre, $caracteristicas);
       return $personaje;
    }
}