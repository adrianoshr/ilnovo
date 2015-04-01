<?php
ob_start();
require '../includes/main.php';
require '../controller/Newsletter.php';
ob_end_clean();
$id = $_REQUEST['id'];
$email = $_REQUEST['email'];
$oNews = new Newsletter();
$oNews->Load('id=' . $id);
$arAttibutes = $oNews->GetAttributeNames();
foreach ($arAttibutes as $attribute) {
    $$attribute = $oNews->$attribute;
}
if (empty($contenido)) {
    $contenido = '<h1>Muchas Gracias ' . $email . ' por Suscribirte a Nuestro Boletín de Noticias.</hi>';
}

$pass = $_REQUEST['pass'];
?><head>
    <meta name="viewport" content="width=device-width" >
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>NAN - Boletín de Noticias</title>
    <style type="text/css">
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
        <img src="<?= PATH ?>assets/img/nanlaboratorios_logo.png" alt="NAN LABORATORIOS" style="margin: 0;padding: 0;font-family: bookline, Helvetica, Helvetica, Arial, sans-serif;max-width: 100%;">
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
                                    <?= (false == $asunto) ? 'Boletín de Noticias' : $asunto; ?></h3>
                                <p style="font-size:17px; color:#4A4A49">
                                    <?= $contenido ?>
                                </p>

                                <p style="font-size:17px; color:#4A4A49">
                                    Gracias.<br />
                                    Il Novo Catering
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
                                                            Tel. <b><a href="tel:7771002565">777 100.25.65</a></b>, E-mail
                                                            <b><a href="emailto:info@ilnovo.catering" style="color: #fff;">
                                                                    info@ilnovo.catering
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