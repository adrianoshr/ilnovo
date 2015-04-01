<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$targ_w = 1276;
$targ_h = 668;
$jpeg_quality = 90;

$src = '../../files/articulos/original/' . $_POST['imagen'];
if (true == $_POST['imagen']) {
    $ext = pathinfo($src, PATHINFO_EXTENSION);

    $nombreArchivo = $_POST['imagen'];
    if ('png' == $ext) {
        png2jpg($src);
        $src = str_replace('png', 'jpg', $src);
        $nombreArchivo = str_replace('png', 'jpg', $_POST['imagen']);
    }
    $img_r = imagecreatefromjpeg($src);
    list($width, $height) = getimagesize($src);
    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);

    imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x1'], $_POST['y1'], $targ_w, $targ_h, $_POST['w'], $_POST['h']);

    imagejpeg($dst_r, $src = '../../files/articulos/big/' . $_POST['imagen'], $jpeg_quality);
    $ds = DIRECTORY_SEPARATOR;
    $storeFolder = '../../files/articulos';
    $direccion = dirname(__FILE__) . $ds . $storeFolder . $ds;
    $archivoBig = $direccion . 'big' . $ds . $nombreArchivo;
    $archivoMedium = $direccion . 'medium' . $ds . $nombreArchivo;
    $archivoSmall = $direccion . 'small' . $ds . $nombreArchivo;

    copy($src, $archivoMedium);
    copy($src, $archivoSmall);
    copy($src, $archivoBig);

    image_gd($archivoMedium, 485);
    image_gd($archivoSmall, 150);
}

function png2jpg($filePath) {
    $image = imagecreatefrompng($filePath);
    $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
    imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
    imagealphablending($bg, TRUE);
    imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
    imagedestroy($image);
    $quality = 90; // 0 = worst / smaller file, 100 = better / bigger file
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
    } else if ('gif' == $extension[$ext]) {
        $image = ImageCreateFromGIF($file);
    } else if ('png' == $extension[$ext]) {
        $image = ImageCreateFromPNG($file);
    } else {
        echo 'Error, extencion no permitida ->' . $file;
        die();
    }

    $thumb_name = substr($file, 0, -4);
    $width = imagesx($image);
    $height = imagesy($image);

    if ($width > $tam) {
        $nueva_anchura = $tam;
        $nueva_altura = ($nueva_anchura * $height) / $width;
    } else {
        $nueva_anchura = $width;
        $nueva_altura = $height;
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
    ImageJPEG($thumb, '' . $thumb_name . '.jpg', 90);
    imagedestroy($image);

    return $image;
}

$resultado = array();
$resultado['nombre'] = $nombreArchivo;
echo json_encode($resultado);
?>
