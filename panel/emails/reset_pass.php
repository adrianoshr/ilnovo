<?php
ob_start();
require '../includes/main.php';
require '../model/load_user.php';
ob_end_clean();
$pass = $_REQUEST['pass'];
?><head>
    <meta name="viewport" content="width=device-width" >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Il Novo - Renovación de su Contraseña</title>
    <style type="text/css">
        /* Be sure to place a .clear element after each set of columns, just to be safe */
        .clear { display: block; clear: both; }
        @media only screen and (max-width: 600px) {
            a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}
            div[class="column"] { width: auto!important; float:none!important;}
            table.social div[class="column"] {
                width:auto!important;
            }
        }
        @font-face{
            font-family: bookline;
            src: url(../../fonts/26FAC9_1_0.woff);
        }
        body{
            background-color: #f0f2ea;
            font-family: bookline;
        }
        .table td{
            border: 2px solid #E5E5E5;
            width: 30%;
            text-align: center;
            padding: 5px 10px;
        }
        .inner-table td{
            border:none;
            padding: 0px;
            font-weight: bold;
            color:#1abc9c;
        }
        p{
            font-size: 16px;
        }
    </style>
</head>
<body bgcolor="#FFFFFF" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;-webkit-font-smoothing: antialiased;-webkit-text-size-adjust: none;height: 100%;background-color: #f0f2ea;width: 100%!important;">
    <p align="center" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
        <img src="<?= PATH ?>images/nanlaboratorios_logo.png" alt="NAN LABORATORIOS" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 100%;">
    </p>
    <table class="body-wrap" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;"></td>
            <td class="container" bgcolor="#FFFFFF" style="margin: 0 auto!important;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
                <div class="content" style="box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.27); margin: 0 auto;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                    <table style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <h3 align="center" style="margin: 0;padding: 0;font-family: HelveticaNeue-Light, bookline Light, bookline, Helvetica, Arial, Lucida Grande, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #4A4A49;font-weight: 500;font-size: 27px;">
                                    Renovación de Contraseña</h3>
                                <p style="font-size:17px; color:#4A4A49">
                                    Su nueva contraseña es: <?= $pass ?><br>
                                    Nota: Una vez que haya ingresado al sistema le recomendamos modificar su contraseña.
                                    &nbsp; <a href="<?= PATH . 'index.php' ?>" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;font-weight: bold;">Ingrese ahora</a>.
                                </p>
                                <p style="font-size:17px; color:#4A4A49">
                                    Si no puede hacer clic, porfavor copie y pegue el link en tu explorador web. <br />Una vez confirmado su correo podr&aacute; ingresar a su cuenta con el siguiente link: <?= PATH ?>
                                </p>
                                <p style="font-size:17px; color:#4A4A49">
                                    Gracias.<br />
                                    Equipo de NAN LABARATORIOS.
                                </p>
                                <br style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <br style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <table class="social" width="100%" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;background-color: #00303B;width: 100%;">
                                    <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                        <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                            <!--- column 2 -->
                                            <table align="left" class="column" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;float: left;">
                                                <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                                    <td style="margin: 0;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                                        <p style="color:#fff; margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
                                                            <span style="font-size: 16px">Informaci&oacute;n de Contacto: </span>
                                                            Tel. <b>408.341.0600</b>, E-mail
                                                            <b><a href="emailto:info@nanlaboratorios.com" style="color: #fff;">
                                                                    info@nanlaboratorios.com
                                                                </a></b></p></td></tr></table>
                                            <span class="clear"></span>
                                        </td></tr></table></td></tr></table></div></td><td></td></tr></table>
    <table class="footer-wrap" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;clear: both!important;">
        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;"></td>
            <td class="container" style="margin: 0 auto!important;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
                <div class="content" style="margin: 0 auto;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                    <table style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;"><td align="center" ><p style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;">Terminos</a> |
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;">Privacidad</a> |
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;"><unsubscribe style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">Cancelar Suscripci&oacute;n</unsubscribe></a>
                                </p></td></tr></table></div></td><td></td></tr></table></body>