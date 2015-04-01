<?php

//  ----------------------------------------------------------------------------
// This function uses the QSI Response code retrieved from the Digital
// Receipt and returns an appropriate description for the QSI Response Code
//
// @param $responseCode String containing the QSI Response Code
//
// @return String containing the appropriate description
//
function getResultDescription($responseCode) {

    switch ($responseCode) {
        case '0' : $result = 'Transacci&oacute;n exitosa';
            break;
        case '?' : $result = 'No se conoce el estado de la transacci&oacute;';
            break;
        case 'E' : $result = 'Referido';
            break;
        case '1' : $result = 'Transacci&oacute;n declinada';
            break;
        case '2' : $result = 'El Banco declino la transacci&oacute;n';
            break;
        case '3' : $result = 'Sin respuesta del Banco';
            break;
        case '4' : $result = 'Tarjeta caducada';
            break;
        case '5' : $result = 'Los fondos no son suficientes';
            break;
        case '6' : $result = 'Error de Comunicacion con el Banco';
            break;
        case '7' : $result = 'El servidor de pago detecto un error';
            break;
        case '8' : $result = 'El Tipo de transacci&oacute;n no es soportada';
            break;
        case '9' : $result = 'El Banco declino la transacci&oacute;n (No se contacto al banco)';
            break;
        case 'A' : $result = 'Transacci&oacute;n Abortada';
            break;
        case 'B' : $result = 'Riesgo de Fraude Bloqueado';
            break;
        case 'C' : $result = 'Transacci&oacute;n cancelada';
            break;
        case 'D' : $result = 'Transacci&oacute;n diferida se ha recibido y est&aacute; en espera de procesamiento';
            break;
        case 'E' : $result = 'Transacci&oacute;n declinada - Consulte el emisor de la tarjeta';
            break;
        case 'F' : $result = 'La Autenticaci&oacute;n segura 3D ha fracasado';
            break;
        case 'I' : $result = 'Tarjeta de verificaci&oacute;n y C&oacute;digo de Seguridad ha fracasado';
            break;
        case 'L' : $result = 'Transacci&oacute;n de Compra cerrada (Int&eacute;ntelo m&aacute;s tarde)';
            break;
        case 'M' : $result = 'Transacci&oacute;n enviada (No hay respuesta del adquirente)';
            break;
        case 'N' : $result = 'El titular de la tarjeta no est&aacute; inscrito en el esquema de autenticaci&oacute;n';
            break;
        case 'P' : $result = 'Transacci&oacute;n ha sido recibido por el adaptador de Pago y se est&aacute; procesando';
            break;
        case 'R' : $result = 'La transacci&oacute;n no se proces&oacute; - Alcanzado l&iacute;mite de reintentos permitidos';
            break;
        case 'S' : $result = 'Sesi&oacute;n duplicada (Solo American Express)';
            break;
        case 'T' : $result = 'Ha Fallado la verificaci&oacute;n de la direcci&oacute;n';
            break;
        case 'U' : $result = 'Ha Fallado el c&oacute;digo de seguridad de la tarjeta de cr&eacute;dito?';
            break;
        case 'V' : $result = 'Ha Fallado la verificaci&oacute;n de la direcci&oacute;n y el c&oacute;digo de seguridad de la tarjeta';
            break;
        default : $result = 'No es posible determinar';
    }
    return $result;
}

//  ----------------------------------------------------------------------------
// This function uses the QSI AVS Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.
// @param avsResultCode String containing the QSI AVS Result Code
// @return description String containing the appropriate description

function getAVSResultDescription($avsResultCode) {

    if ('' != $avsResultCode) {
        switch ($avsResultCode) {
            Case 'Unsupported' : $result = 'AVS no es compatible o no ha proporcionados datos AVS';
                break;
            Case 'X' : $result = 'Coincidencia exacta - Direcci&oacute;n y 9 d&iacute;gitos del c&oacute;digo postal';
                break;
            Case 'Y' : $result = 'Coincidencia exacta - Direcci&oacute;n y 5 d&iacute;gitos del c&oacute;digo postal';
                break;
            Case 'W' : $result = 'El c&oacute;digo postal de 9 d&iacute;gitos corresponde, la direcci&oacute;n no se repite';
                break;
            Case 'S' : $result = 'Servicio no soportado o direcci&oacute;n no verificada (transacci&oacute;n internacional)';
                break;
            Case 'G' : $result = 'El emisor no participa en AVS (transacciones internacionales)';
                break;
            Case 'C' : $result = 'La Direcci&oacute;n y C&oacute;digo Postal no ha sido verificada por la transacci&oacute;n internacional debido a la incompatibilidad de formatos.';
                break;
            Case 'I' : $result = 'S&oacute;lo Visa. Informaci&oacute;n de la direcci&oacute;n no ha sido verificada por transacci&oacute;n internacional.';
                break;
            Case 'A' : $result = '&Uacute;nicamente coincide la direcci&oacute;n';
                break;
            Case 'Z' : $result = 'El c&oacute;digo postal de 5 d&iacute;gitos corresponde, la direcci&oacute;n no se repite';
                break;
            Case 'R' : $result = 'Issuer system is unavailable';
                break;
            Case 'U' : $result = 'Direcci&oacute;n no disponible o no verificada';
                break;
            Case 'E' : $result = 'Direcci&oacute;n y C&oacute;digo postal no previstos';
                break;
            Case 'B' : $result = 'Direcci&oacute;n concuerda para la transacci&oacute;n internacional. C&oacute;digo Postal no ha sido verificada debido a la incompatibilidad de formatos.';
                break;
            Case 'N' : $result = 'No se repite la Direcci&oacute;n y c&oacute;digo postal';
                break;
            Case '0' : $result = 'No solicit&oacute; AVS';
                break;
            Case 'D' : $result = 'Direcci&oacute;n y c&oacute;digo coinciden postal para la transacci&oacute;n internacional.';
                break;
            Case 'M' : $result = 'Direcci&oacute;n y c&oacute;digo coinciden postal para la transacci&oacute;n internacional.';
                break;
            Case 'P' : $result = 'Los C&oacute;digos postales corresponden a transacciones internacionales, pero no ha sido verificada la direcci&oacute;n de la calle debido a la incompatibilidad de formatos.';
                break;
            Case 'K' : $result = 'Solo coincide el nombre del titular de tarjeta s&oacute;lo coincide.';
                break;
            Case 'F' : $result = 'La Direcci&oacute;n Calle y coincidencia de c&oacute;digo postal. Se aplica s&oacute;lo U.K..';
                break;
            default : $result = 'No es posible determinar';
        }
    } else {
        $result = 'Respuesta nula';
    }
    return $result;
}

//  ----------------------------------------------------------------------------
// This function uses the QSI CSC Result Code retrieved from the Digital
// Receipt and returns an appropriate description for this code.
// @param cscResultCode String containing the QSI CSC Result Code
// @return description String containing the appropriate description

function getCSCResultDescription($cscResultCode) {

    if ($cscResultCode != '') {
        switch ($cscResultCode) {
            Case 'Unsupported' : $result = 'CSC no es compatible o no hab&iacute;a datos proporcionados CSC';
                break;
            Case 'M' : $result = 'Coincidencia de c&oacute;digo exacta';
                break;
            Case 'S' : $result = 'El Comerciante ha indicado que CSC no est&aacute; presente en la tarjeta (Situaci&oacute;n MOTO)';
                break;
            Case 'P' : $result = 'El C&oacute;digo no procede';
                break;
            Case 'U' : $result = 'El emisor de tarjeta no est&aacute; registrado y / o certificado';
                break;
            Case 'N' : $result = 'C&oacute;digo no válido o no coincide';
                break;
            default : $result = 'No es posible determinar';
                break;
        }
    } else {
        $result = 'Respuesta nula';
    }
    return $result;
}

//  -----------------------------------------------------------------------------
?>