<?php
require '../includes/main.php';
//require '../controller/Usuario.php';
require '../model/load_user.php';
?>
<head>
    <!-- If you delete this tag, the sky will fall on your head -->
    <meta name="viewport" content="width=device-width" >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Il Novo - Activación de su Cuenta</title>
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
    <!-- A Real Hero (and a real human being) -->
    <p align="center" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
        <img src="<?= PATH ?>images/nanlaboratorios_logo.png" alt="BookLine" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 100%;">
    </p>
    <!-- BODY -->
    <table class="body-wrap" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;"></td>
            <td class="container" bgcolor="#FFFFFF" style="margin: 0 auto!important;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">
                <div class="content" style="box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.27); margin: 0 auto;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                    <table style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <h3 align="center" style="margin: 0;padding: 0;font-family: HelveticaNeue-Light, bookline Light, bookline, Helvetica, Arial, Lucida Grande, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #4A4A49;font-weight: 500;font-size: 27px;">
                                    Bienvenido a NaN Laboratorios -<?= $nombre . ' ' . $ap ?>-</h3>
                                <!-- Callout Panel -->
                                <p style="font-size:17px; color:#4A4A49">
                                    Se ha registrado con el Usuario: <b><?= $nombreu; ?></b><br/><br/>
                                    Para comenzar a disfrutar de nuestros servicios es muy importante que confirme su registro, y pueda recibir nuestros correos. Por favor da clic en el siguiente link para confirmar:
                                    &nbsp; <a href="<?= PATH . 'login-user.php?key=' . $llave ?>" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;font-weight: bold;">Confirmar ahora</a>.
                                    <br><?= PATH . 'login-user.php?key=' . $llave ?>
                                </p><!-- /Callout Panel -->
                                <p style="font-size:17px; color:#4A4A49">
                                    Si no puede hacer clic, porfavor copie y pegue el link en tu explorador web. <br />Una vez confirmado su correo podr&aacute; ingresar a su cuenta con el siguiente link: <?= PATH ?>
                                </p>
                                <p style="font-size:17px; color:#4A4A49">
                                    Gracias por registrarse.<br />
                                    NAN Laboratorios
                                </p>
                                <br style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <br style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                <!-- social & contact -->
                                <table class="social" width="100%" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;background-color: #b23c42
                                       ;width: 100%;">
                                    <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                        <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                            <!--- column 2 -->
                                            <table align="left" class="column" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;float: left;">
                                                <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                                    <td style="margin: 0;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                                                        <p style="color:#fff; margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
                                                            <span style="font-size: 16px">Informaci&oacute;n de Contacto: </span>
                                                            Tel. <b>01 800 CALL NAN (81) ,  8115 8502 </b>, E-mail
                                                            <b><a href="emailto:info@nanlaboratorios.com" style="color: #fff;">
                                                                    info@nanlaboratorios.com
                                                                </a></b></p>
                                                    </td>
                                                </tr>
                                            </table><!-- /column 2 -->
                                            <span class="clear"></span>
                                        </td>
                                    </tr>
                                </table><!-- /social & contact -->
                            </td>
                        </tr>
                    </table>
                </div>
            </td>
            <td></td>
        </tr>
    </table><!-- /BODY -->
    <!-- FOOTER -->
    <table class="footer-wrap" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;clear: both!important;">
        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
            <td style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;"></td>
            <td class="container" style="margin: 0 auto!important;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 600px!important;clear: both!important;">

                <!-- content -->
                <div class="content" style="margin: 0 auto;padding: 15px;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 600px;display: block;">
                    <table style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                        <tr style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">
                            <td align="center" >
                                <p style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 14px;line-height: 1.6;">
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;">Terminos</a> |
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;">Privacidad</a> |
                                    <a href="#" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;color: #EF4D5D;"><unsubscribe style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;">Cancelar Suscripci&oacute;n</unsubscribe></a>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div><!-- /content -->
            </td>
            <td></td>
        </tr>
    </table><!-- /FOOTER -->
</body>