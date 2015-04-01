<?php

class Mail {

    var $mime_version = '1.0';
    var $charset = 'utf-8';
    var $boundary = " \"--_Separador-de-mensajes_--\"\n";
    var $fromMail;
    var $fromName;
    var $fromTelefono;
    var $replyTo;
    var $returnPath;
    var $type = 2;
    var $recipients;
    var $cc;
    var $bcc;
    var $subject;
    var $mailHeader;
    var $body;
    var $attachment;

    function Mail() {

    }

    function addAddress($mail) {
        $MailList = $this->recipients;
        $Agregado = false;
        if ('' == trim($MailList)) {
            if (true == $this->validaMail($mail)) {
                $MailList = $mail;
                $Agregado = true;
            } else {
                $Agregado = false;
            } //Fin de valida mail valido
        } else {
            if (true == $this->validaMail($mail)) {
                $MailList = $MailList . ',' . $mail;
                $Agregado = true;
            } else {
                $Agregado = false;
            }// Fin de valida mail valido
        } // Fin de id
        $this->recipients = $MailList;
        return $Agregado;
    }

    function addCcAddress($mail) {
        $MailListCC = $this->cc;
        $Agregado = false;
        if ('' == trim($MailListCC)) {
            if (true == $this->validaMail($mail)) {
                $MailListCC = $mail;
                $Agregado = true;
            } else {
                $Agregado = false;
            } //Fin de valida mail valido
        } else {
            if (true == $this->validaMail($mail)) {
                $MailListCC = $MailListCC . ',' . $mail;
                $Agregado = true;
            } else {
                $Agregado = false;
            }// Fin de valida mail valido
        } // Fin de id
        $this->cc = $MailListCC;
        return $Agregado;
    }

    function addBccAddress($mail) {
        $MailListBcc = $this->bcc; // Obtiene lista de correos
        $Agregado = false; // Inicializa bandera como falso
        if ('' == trim($MailListBcc)) { //Si lista esta vacia o es el primer correo agregado
            if (true == $this->validaMail($mail)) { //Valida que sea un correo valido
                $MailListBcc = $mail; // Agrega el mail
                $Agregado = true; // Returna como que fue agregado
            } else {
                $Agregado = false; // Retorna como que no se pudo agregar
            } //Fin de valida mail valido
        } else { // Si ya hay por lo menos un correo agregado
            if (true == $this->validaMail($mail)) { // Valida si es un correo valido
                $MailListBcc = $MailListBcc . ',' . $mail;
                $Agregado = true;
            } else {
                $Agregado = false;
            }
        }
        $this->bcc = $MailListBcc;
        return $Agregado;
    }

    function send() {
        $eol = "\r\n"; // Establece fin de linea
        $header.='From: ' . $this->fromName . '<' . $this->fromMail . '>' . $eol;
        $header.='MIME-Version:' . $this->mime_version . $eol;
        if (!empty($this->replyTo)) {
            $header.='Reply-To: ' . $this->replyTo . $eol;
        }// Fin de if
        if (!empty($this->returnPath)) {
            $header.='Return-path: ' . $this->returnPath . $eol;
        }// Fin de if
        $header.='Cc: ' . $this->cc . $eol; //Con copia
        $header.='Bcc: ' . $this->bcc . $eol; // Con copia oculta
        if ('' == $this->attachment) { // Si no se ha mandado llamar
            $header.='Content-Type: ' . $this->getType($this->type) . '; charset=' . $this->charset . $eol;
        } else { // Si se ha mandado llamar el metodo attach desde fuera de la clase
            $header.='Content-Type: ' . $this->getType(3) . ";";
            $header.='boundary=' . $this->boundary;
        }// Fin de if
        $this->mailHeader = $header;
        if (empty($this->attachment)) {
            $contenido = $this->body;
        } else {
            $cabecera2 .= "\n\n----_Separador-de-mensajes_--\n";
            $cabecera2 .= "Content-Type: " . $this->getType($this->type) . ';charset=' . $this->charset . $eol;
            $cabecera2 .= "Content-transfer-encoding: 7BIT" . $eol;
            $contenido = $cabecera2;
            $contenido .= "\n" . $this->body;
            $contenido .= $this->attachment;
        }
        if (mail($this->recipients, $this->subject, $contenido, $this->mailHeader)) {
            return true;
        } else {
            return false;
        }
    }

    private function getType($type) {
        switch ($type) {
            case 1:
                $ContentType = 'text/plain';
                break;
            case 2:
                $ContentType = 'text/html';
                break;
            case 3:
                $ContentType = 'multipart/mixed';
                break;
        }// Fin de switch
        return $ContentType;
    }

    public function attachFile($fileType, $fileName, $temp_name) {
        $sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
        $sAdjuntos .= 'Content-type: ' . $fileType . ";name=\"" . $fileName . "\"\n";
        $sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
        $sAdjuntos .= "Content-disposition: attachment;filename=\"" . $fileName . "\"\n\n";
        $oFichero = fopen($temp_name, 'r'); // Abre el fichero
        $sContenido = fread($oFichero, filesize($temp_name)); // Convierte a binario cualquier archivo
        $sAdjuntos .= chunk_split(base64_encode($sContenido)); // Codifica la variable binario y lo codifica con MIME 64 y los fracciona para su envio
        fclose($oFichero); // Cierra el fichero
        $sAdjuntos .= "\n\n----_Separador-de-mensajes_----\n";
        $this->attachment = $sAdjuntos; // Se agregan los datos como archivos adjuntos
    }

    function validaMail($email) {
        $mail_correcto = 0;
        if (6 <= (strlen($email)) && 1 == (substr_count($email, '@')) && '@' != (substr($email, 0, 1) ) && (substr($email, strlen($email) - 1, 1) != '@')) {
            if ((!strstr($email, "'")) && (!strstr($email, "\"")) && (!strstr($email, "\\")) && (!strstr($email, '$')) && (!strstr($email, " "))) {
                if (1 <= substr_count($email, '.')) {
                    $term_dom = substr(strrchr($email, '.'), 1);
                    if (1 < strlen($term_dom) && 5 > strlen($term_dom) && (!strstr($term_dom, '@'))) {
                        $antes_dom = substr($email, 0, strlen($email) - strlen($term_dom) - 1);
                        $caracter_ult = substr($antes_dom, strlen($antes_dom) - 1, 1);
                        if ('@' != $caracter_ult && '.' != $caracter_ult) {
                            $mail_correcto = 1;
                        }
                    }
                }
            }
        }
        if (1 == $mail_correcto) {
            return true;
        } else {
            return false;
        }
    }

}

?>