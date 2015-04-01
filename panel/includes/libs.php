<?php

function png2jpg($filePath) {
    $image = imagecreatefrompng($filePath);
    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
    imagealphablending($bg, TRUE);
    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    imagedestroy($image);
    $quality = 100; // 0 = worst / smaller file, 100 = better / bigger file
    $filePath = str_replace('.png', '', $filePath);
    imagejpeg($bg, $filePath . '.jpg', $quality);
    ImageDestroy($bg);
}

function image_gd($file, $tam = 800) {
//Separamos las extenciones de archivos para definir el tipo de ext.
    $extension = explode(".", $file);
    $ext = count($extension) - 1;
//Determinamos las extenciones permitidas.
    if ('jpg' == $extension[$ext] || 'jpeg' == $extension[$ext] || 'JPG' == $extension[$ext]) {
        $image = ImageCreateFromJPEG($file);
    } else if ($extension[$ext] == 'gif') {
        $image = ImageCreateFromGIF($file);
    } else if ($extension[$ext] == 'png') {
        $image = ImageCreateFromPNG($file);
    } else {
        echo 'Error, extencion no permitida ->' . $file;
        die();
    }

    $thumb_name = substr($file, 0, -4); //nombre del thumbnail
    $width = imagesx($image); //ancho
    $height = imagesy($image); //alto

    if ($width > $tam) {
        $nueva_anchura = $tam; // Definimos el tamaño a 100 px
        $nueva_altura = ($nueva_anchura * $height) / $width; // tamaño proporcional
    } else {
        $nueva_anchura = $width; // Definimos el tamaño a 100 px
        $nueva_altura = $height; // tamaño proporcional
    }

    if (1000 < $nueva_altura) {
        $an = $nueva_altura;
        $nueva_altura = 1000;
        $nueva_anchura = ($nueva_altura * $nueva_anchura) / $an;
    }

    if (function_exists('imagecreatetruecolor')) {
        $thumb = ImageCreateTrueColor($nueva_anchura, $nueva_altura); //Color Real
    }
//En caso de no encontrar la funcion, la saca en calidad media
    if (!$thumb) {
        $thumb = ImageCreate($nueva_anchura, $nueva_altura);
    }

    ImageCopyResized($thumb, $image, 0, 0, 0, 0, $nueva_anchura, $nueva_altura, $width, $height);
//header("Content-type: image/jpeg");
    ImageJPEG($thumb, '' . $thumb_name . '.jpg', 100);
    imagedestroy($image);

    return $image;
}

function Convertir_a_url($title) {

    $title = stripAccents($title);

    $arrStupid = array('feat.', 'feat', '.com', '(tm)', ' ', '*', "'s", '"', ',', ':', ';', '@', '#', '(', ')', '?', '!', '_', '$', '+', '=', '|', "'", '/', '~', '`s', '`', '\\', '^', '[', ']', '{', '}', '<', '>', '%', '&#8482;', '&rdquo;', '&iacute;', '&ntilde;', '&amp;', '&', '®');
    $title = preg_replace('/&([a-zA-Z])(.*?);/', '$1', $title);
    $title = htmlentities($title);
    $title = strtolower($title);
    $title = str_replace('', '', $title);
    $title = str_replace('.', '', $title);
    $title = str_replace('&amp;', '', $title);
    $title = str_replace('&', '', $title);
    $title = str_replace($arrStupid, '-', $title);
    $title = str_replace('039;', '', $title);
    $title = str_replace('--', '-', $title);
    $flag = 1;
    while ($flag) {
        $newtitle = str_replace('--', '-', $title);
        if ($title != $newtitle) {
            $flag = 1;
        } else
            $flag = 0;
        $title = $newtitle;
    }
    $len = strlen($title);
    if ('-' == $title[$len - 1]) {
        $title = substr($title, 0, $len - 1);
    }
    return $title;
}

function stripAccents($string) {
    return strtr(utf8_decode($string), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
}

?>