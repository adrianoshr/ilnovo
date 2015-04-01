<?php

session_start();
define('WEBMASTER_EMAIL', 'info@ilnovo.catering');
define('EMAIL_SUBJECT', 'Nuevo Mensaje de la página web');

function validate_email($email) {
    $regex = '/([a-z0-9_.-]+)' . # (Name) Letters, Numbers, Dots, Hyphens and Underscores
            '@' . # (@ -at- sign)
            '([a-z0-9.-]+){2,255}' . # Domain) (with possible subdomain(s) ).
            '.' . # (. -period- sign)
            '([a-z]+){2,10}/i'; # (Extension) Letters only (up to 10 (can be increased in the future) characters)

    if ($email == '') {
        return false;
    } else {
        $eregi = preg_replace($regex, '', $email);
    }

    return empty($eregi) ? true : false;
}

error_reporting(E_ALL ^ E_NOTICE);
$post = (!empty($_POST) ) ? true : false;
if ($post) {
    $email = trim($_POST['email']);
    $zip = intval($_POST['zip']);
    $captcha = strtoupper(trim(stripslashes(strip_tags($_POST['yenoh']))));
    $subject = EMAIL_SUBJECT;
    $error = '';
    // Check email
    if (!$email) {
        $error .= 'Por favor escribe tu email.<br />';
    }
    if ($email && !validate_email($email)) {
        $error .= 'Por favor escribe un e mail válido.<br />';
    }

    // Check timer
    if (isset($_SESSION['secure']['time']) && time() - $_SESSION['nonce']['time'] < 30) {
        $error .= "Moving too fast!<br />";
    }
    if (!$error) {
        foreach ($_POST as $key => $var) {
            $msg .= "\n $key: " . strip_tags($_POST[$key]);
        }
        $mail = mail(WEBMASTER_EMAIL, $subject, $msg, "From: " . $name . " <" . $email . ">\r\n"
                . "Reply-To: " . $email . "\r\n"
                . "Bcc: adrianoshr@gmail.com ,mvelazquez.barocio@gmail.com,info@one-man-studio.com \r\n"
                . "X-Mailer: PHP/" . phpversion());

        if ($mail) {
            echo 'Los Datos se Enviaron Correctamente, en Breve un Representante se Contactara con Usted.';
        }
    } else {
        echo $error;
    }
}
?>