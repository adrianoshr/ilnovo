<?php
ob_start();
require 'includes/mainfile.php';
require 'model/stadistics.php';
//include("controller/Empresa.php");
ob_end_clean();
ob_start('ob_gzhandler');
//$oEmpresa = new Empresa();
//$oEmpresa->load("id_empresa = " . $_SESSION['g000_id_empresa']);
?><html>
    <head>
        <?php include 'snippets/head_admin.php'; ?>
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-daterangepicker/daterangepicker-bs3.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/fullcalendar/fullcalendar.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-markdown/css/bootstrap-markdown.min.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/codeprettifier/prettify.css' />
        <link rel='stylesheet' type='text/css' href='assets/plugins/form-toggle/toggles.css' />
        <link rel='stylesheet' type='text/css' href='assets/css/bootstrap-tour.css' />
    </head>
    <body><?php include 'snippets/header_admin.php'; ?>
        <div id="page-content">
            <div id='wrap'>
                <div id="page-heading">
                    <ol class="breadcrumb">
                        <li class='active'><a href="#">Panel de Control </a></li>
                    </ol>
                    <h1 align="center">Panel de Control</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-indigo">
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-md-6">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <div class="row">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-grape">
                                <div class="panel-body">
                                    <div class="row">
                                        <div id="stadistic2" align="center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="display:none;">
                        <div class="col-md-6" >
                            <div class="panel panel-indigo" style="">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table" style="margin-bottom: 18px;">
                                            <thead>
                                                <tr class="tr_home" style="background-color: #d8d8d8 !important; color: #0b272d !important;">
                                                    <th class="col-xs-9 col-sm-3">Nombre</th>
                                                    <th class="col-sm-6 hidden-xs">Fecha</th>
                                                    <th class="col-xs-2 col-sm-2">Estatus</th>
                                                </tr>
                                            </thead>
                                            <tbody class="selects">
                                                <tr>
                                                    <td><?= $row['nombre']; ?></td>
                                                    <td class="hidden-xs"><?= $row['fecha'] ?></td>
                                                    <td><span class="label label-<?= $color ?>"><?= $row['estatus'] ?></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-indigo" style="">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'snippets/footer_admin.php'; ?>
        <script type='text/javascript' src='<?= PATH; ?>panel/assets/plugins/form-daterangepicker/daterangepicker.min.js'></script>
        <script type='text/javascript' src='<?= PATH; ?>panel/assets/plugins/pulsate/jQuery.pulsate.min.js'></script>
        <script type='text/javascript' src='<?= PATH; ?>panel/assets/plugins/fullcalendar/fullcalendar.min.js'></script>
        <script type='text/javascript' src='<?= PATH; ?>panel/assets/plugins/bootstrap-tour/bootstrap-tour.js'></script>
    </body>
</html><?php ob_end_flush(); ?>