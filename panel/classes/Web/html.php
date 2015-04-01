<?php

/*
  +----------------------------------------------------------------------+
  | PHP version 5
  +----------------------------------------------------------------------+
  | Authors: Tsu. Benjamin Castillo Arriaga <benjamin.castillo.arriaga@gmail.com>
  +----------------------------------------------------------------------+
  | Clase: html
  |  Atributos:
  |  Metodos:
  |       new(void):String
  | Descripcion: Permite obtener en una cadena el contenido de una url
  |
  +----------------------------------------------------------------------+
  | Version: 0.0
  | Fecha:18-Oct-09
  +----------------------------------------------------------------------+
 */

class html {

    function getPage($url, $inicio = '', $final) {
        $source = @file_get_contents($url) or trigger_error('Error al obtener url ' . $url, E_USER_ERROR);
        $posicion_inicio = strpos($source, $inicio) + strlen($inicio);
        $posicion_final = strpos($source, $final) - $posicion_inicio;
        $found_text = substr($source, $posicion_inicio, $posicion_final);
        return $inicio . $found_text . $final;
    }

}

?>