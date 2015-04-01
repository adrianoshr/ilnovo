<?php

/*
  +----------------------------------------------------------------------+
  | PHP version 5
  +----------------------------------------------------------------------+
  | Clase: combo
  |  Propiedades:
  |		prefijo:string                           Define el prefijo del archivo redimensionado
  |		rutaOrigen:string                    Define la ruta relativa desde donde es usada la clase
  |		rutaDestino:string                  Define la ruta donde se guardara la imagen redimensionada
  |		calidadImagenDestino:int       Define la calidad de la imagen redimensionada en porcentaje de (0 a 100) %
  |		altura:int                                 Define la altura m�xima de la imagen redomensionada
  |      ancho:int                                Define el ancho maximo de la imagen redimensionada
  |  Metodos:
  | 		thumbjpeg():boolean
  |
  | Descripcion: Redimensiona im�genes jpg
  |
  +----------------------------------------------------------------------+
  | Ultima fecha de modificacion:  03-Feb-10
  | Version: 0.3
  +----------------------------------------------------------------------+
 */

class Imagen {

    var $prefijo;
    var $rutaOrigen;
    var $rutaDestino;
    var $nombreArchivoOrigen;
    var $nombreArchivoDestino;
    var $calidadImagenDestino = 90;
    var $altura;
    var $ancho;

    function thumbjpeg() {
        if (file_exists($this->rutaOrigen . $this->nombreArchivoOrigen)) {
            if (strpos($this->nombreArchivoOrigen, 'png')) {
                $img = imagecreatefrompng($this->nombreArchivoOrigen);
            } elseif (strpos($this->nombreArchivoOrigen, 'jpg')) {
                $img = imagecreatefromjpeg($this->nombreArchivoOrigen);
            } elseif (strpos($this->nombreArchivoOrigen, 'gif')) {
                $img = imagecreatefromgif($this->nombreArchivoOrigen);
            }

            if ($img) {
                $original_w = imagesx($img);
                $original_h = imagesy($img);
                if (!empty($this->ancho) && empty($this->altura)) {
                    if ($original_h > $original_w) {
                        $muestra_w = $this->ancho;
                        $muestra_h = intval(($original_h / $original_w) * $this->ancho);
                    } else {
                        $muestra_w = $this->ancho;
                        $muestra_h = intval(($original_h / $original_w) * $this->ancho);
                    }// Fin de if para calculo de redimension
                } else if (( $this->altura != "") && ($this->ancho == "")) {// Redimensiona de acuerdo a un alto
                    if ($original_w > $original_h) {  // Si el ancho es mas grande que el alto
                        $muestra_w = intval(($original_w / $original_h) * $this->altura);
                        $muestra_h = $this->altura;
                    } else { // Si el alta es mayor
                        $muestra_w = intval(($original_w / $original_h) * $this->altura); //
                        $muestra_h = $this->altura;
                    }// Fin de if para calculo de redimension
                } else if (('' != $this->altura ) && ('' != $this->ancho )) {
                    if ($original_h > $original_w) {
                        $muestra_w = intval(($original_w / $original_h) * $this->altura);
                        $muestra_h = $this->altura;
                    } else if ($original_w > $original_h) {
                        $muestra_w = $this->ancho;
                        $muestra_h = intval(($original_h / $original_w) * $this->ancho);
                    } else {// Si es cuadrada
                        $muestra_w = $this->ancho;
                        $muestra_h = $this->ancho;
                    }// Fin de if
                } else if (('' == $this->altura ) && ('' == $this->ancho)) {
                    trigger_error('No declaro la propiedad "altura" o "ancho" no se podrá crear la imagen', E_USER_NOTICE);
                }// Fin de if de tipo de redimension
                // Fin de Redimemension -------------------------------------------------------------------------------------------
                $thumb = imagecreatetruecolor($muestra_w, $muestra_h); // Crea una imagen en blanco
                imagecopyresampled($thumb, $img, 0, 0, 0, 0, $muestra_w, $muestra_h, $original_w, $original_h); // Redimensiona una imagen
                imagejpeg($thumb, $this->rutaDestino . $this->prefijo . $this->nombreArchivoDestino, $this->calidadImagenDestino);  // Crea el archivo de imagen
                return true;
            } else {
                trigger_error('No se logro crear de imagen ' . $this->rutaOrigen . $this->nombreArchivoOrigen, E_USER_NOTICE);
//				return false;
            }// Fin de si se puede crear la imagen
        } else {
            trigger_error('No se encontro la ruta origen ' . $this->rutaOrigen . $this->nombreArchivoOrigen, E_USER_NOTICE);
        }// Fin de si existe imagen
    }

    function png2jpg($originalFile, $outputFile, $quality = 90) {
        //die(var_dump($originalFile));
        $outputFile = str_replace('.png', '.jpg', $outputFile);
        $image = imagecreatefrompng($originalFile);
        imagejpeg($image, $outputFile, $quality);
        imagedestroy($image);
    }

// Fin de metodo
}

// Fin de clase
?>