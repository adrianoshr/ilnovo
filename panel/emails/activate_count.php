<?php
require '../includes/main.php';
//require '../controller/Usuario.php';
require '../model/load_user.php';
?><head>
    <meta name="viewport" content="width=device-width" >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Il Novo - Activación de su Cuenta</title>
</head>
<style type="text/css">
    @font-face{
        font-family: NAN;
        src: url(../../fonts/font_nan/gotham-book.ttf);
    }
    body{
        width: 60%;
    }
    .redes{
        margin-top: 30px
    }
    @media only screen and (min-width: 0px) and (max-width: 620px) {
        body{
            width: 100%;
        }
        .tr_contacto{
            padding-left: 25px!important;
        }
        .redes{
            margin-top: 0px
        }
    }
    @media only screen and (min-width: 621px) and (max-width: 800px) {
        body{
            width: 80%;
        }
        .tr_contacto{
            padding-left: 30px!important;
        }
        .redes{
            margin-top: 30px
        }
    }
</style>
<body bgcolor="#FFFFFF" style="margin: 0 auto!important;">
    <!-- A Real Hero (and a real human being) -->
    <p align="center" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 12px;line-height: 1.6;">
    <table style="width:100%; border-bottom: solid 3px #B23C42">
        <tr>
            <th style="text-align:left">
                <img src="<?= PATH ?>assets/img/logo.png" alt="NAN Laboratorios" style="max-width: 50%;">
            </th>
            <th></th>
            <th style="text-align:right">
                <img src="<?= PATH ?>assets/img/Llama.jpg" alt="NAN Laboratorios" style="max-width: 50%;">
            </th>
        </tr>
    </table>
</p>
<!-- BODY -->
<table class="body-wrap" style="padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%; min-height: 20px; margin-bottom: 20px; background-color: #F5F5F5; border: 1px solid #E3E3E3; border-radius: 4px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;">
    <tr style="margin: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
        <td style="margin: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;"></td>
        <td class="container" style="margin: 0 auto!important;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 650px!important;clear: both!important;">
            <div class="content" style="margin: 0 auto;padding: 15px;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;max-width: 650px;display: block;">
                <table style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                    <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                        <td style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                            <h3 align="left" style="margin: 0;padding: 0;font-family: HelveticaNeue-Light, NAN Light, NAN, Helvetica, Arial, Lucida Grande, sans-serif;line-height: 1.1;margin-bottom: 15px;color: #666;font-weight: 500;font-size: 27px;">
                                Bienvenido a NAN Laboratorios <span style="color: #b23c42!important"><?= $nombre . ' ' . $ap ?></span></h3>
                            <!-- Callout Panel -->
                            <p style="font-size: 14px; color:#777; line-height: 20px;">
                                Se ha registrado con el Usuario: <b><?= $nombreu; ?></b><br/><br/>
                                Para comenzar a disfrutar de nuestros servicios es muy importante que confirme su registro, y pueda recibir nuestros correos. Por favor da clic en el siguiente link para confirmar:
                                &nbsp; <a href="<?= PATH . 'login-user.php?key=' . $llave ?>" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;color: #666;font-weight: bold;">CONFIRMAR AHORA</a>.
                                <br>
                            <h4 style="color:#666">
                                <?= PATH . 'login-user.php?key=' . $llave ?>
                            </h4>
                            </p><!-- /Callout Panel -->
                            <p style="font-size: 14px; color:#777; line-height: 20px;">
                                Si no puede hacer clic, por favor copie y pegue el link en tu explorador web. <br /><br />Una vez confirmado su correo podr&aacute; ingresar a su cuenta con el siguiente link: <span style="color:#666; display:inline; font-size: 16px;font-weight: bold;"><?= PATH ?></span>
                            </p>
                            <p style="font-size: 14px; color:#777; line-height: 20px;">
                                Gracias por registrarse.<br />
                            <h4 style="color:#666">Equipo NAN Laboratorios</h4>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
        <td></td>
    </tr>
</table><!-- /BODY -->

<table class="social" width="100%" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif; background-color: #F5F5F5; border: 1px solid #E3E3E3; border-radius: 4px; box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05) inset;width: 100%;">
    <tr>
        <th>
    <p style="color:#777; margin: 0;padding: 2px;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal">
    <div style="color:#666; text-align:center; font-size: 14px; font-weight:bold">
        Informaci&oacute;n de Contacto:
    </div>
</p>
</th>
</tr>
<tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
    <td style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
        <table align="left" class="column" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;float: left;">
            <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                <td class="tr_contacto" colspan="2" style="margin: 0;padding-top: 0px; padding-bottom: 12px; padding-left: 50px; font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                    <p class="p-foot">
                        <img src="<?= PATH; ?>assets/img/phone.png">
                        <span style="color: #777; font-size: 13px;"><b>Teléfono: </b>01 800 CALL NAN
                            <span style="color: #777; font-size: 13px;">(81) 8115 8502</span><br>
                            <img src="<?= PATH; ?>assets/img/message.png">
                            <span style="color: #777; font-size: 13px;"><b>Email: </b></span>
                            <a href="mailto:carrito@nanlaboratorios.com" style="color: #777; font-size: 13px; text-decoration: none">carrito@nanlaboratorios.com</a><br>
                            <img src="<?= PATH; ?>assets/img/screen.png">
                            <span style="color: #777; font-size: 14px;"><b>Web: </b></span>:
                            <a href="http://www.nanlaboratorios.com" style="color: #777; font-size: 13px; text-decoration: none">http://www.nanlaboratorios.com</a>
                    </p>
                </td>
                <td>
                    <div class="redes" style="text-align: center;">
                        <a href="#" style="display:inline"><img src="<?= PATH ?>assets/img/icono_facebook.png" style="max-width:100%"></a>
                        <a href="#" style="display:inline"><img src="<?= PATH ?>assets/img/icono_twitter.png" style="max-width:100%"></a >
                        <a href="#" style="display:inline"><img src="<?= PATH ?>assets/img/icono_youtube.png" style="max-width:100%"></a>
                        <div></td>
                            </tr>
                            </table><!-- /column 2 -->
                            <span class="clear"></span>
                            <table class="footer-wrap" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;clear: both!important;">
                                <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                                    <td style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;"></td>
                                    <td class="container" style="margin: 0 auto!important;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 650px!important;clear: both!important;">

                                        <!-- content -->
                                        <div class="content" style="margin: 0 auto;padding: 0px;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;max-width: 650px;display: block;">
                                            <table style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                                                <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                                                    <td align="center" >
                                                        <p style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 12px;line-height: 1.6;">
                                                            <a href="#" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;color: #777; text-decoration: none">Terminos</a> |
                                                            <a href="#" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;color: #777; text-decoration: none">Privacidad</a> |
                                                            <a href="#" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;color: #777; text-decoration: none"><unsubscribe style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">Cancelar Suscripci&oacute;n</unsubscribe></a>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div><!-- /content -->
                                    </td>
                                    <td></td>
                                </tr>
                            </table><!-- /FOOTER -->
                            </td>
                            </tr>
                            </table><!-- /social & contact -->
                            <!-- FOOTER -->
                            <table class="footer-wrap" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;clear: both!important;">
                                <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                                    <td style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;"></td>
                                    <td class="container" style="margin: 0 auto!important;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;display: block!important;max-width: 650px!important;clear: both!important;">

                                        <!-- content -->
                                        <div class="content" style="margin: 0 auto;padding: 0px;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;max-width: 650px;display: block;">
                                            <table style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;width: 100%;">
                                                <tr style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;">
                                                    <td align="center">
                                                        <p style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;margin-bottom: 10px;font-weight: normal;font-size: 12px;line-height: 1.6;">
                                                            <a href="#" style="margin: 0;padding: 0;font-family: NAN, Helvetica, Helvetica, Arial, sans-serif;color: #777; text-decoration: none">Copyrights ©2014. Todos los Derechos Reservados. NAN Laboratorios.</a>
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