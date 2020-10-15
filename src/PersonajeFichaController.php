<?php

class PersonajeFichaController
{
    static function crear($personajeFicha)
    {
            $vars = $personajeFicha->jsonSerialize();
            $json_string = json_encode($vars);
            $file = $vars['nombre'].'.json';
            file_put_contents($file,$json_string);
    }
    static function abrir($file)
    {
       $personaje_json = json_decode(file_get_contents($file));
       $caracteristicas = json_decode(json_encode($personaje_json->caracteristicas), true);
       $habilidades = json_decode(json_encode($personaje_json->habilidades), true);
       $personajeFicha = new PersonajeFicha($personaje_json->nombre, $caracteristicas, $habilidades);
       return $personajeFicha;
    }
}