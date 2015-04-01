<?php
ob_start();
require 'panel/controller/Categoria.php';
require 'panel/controller/Servicio.php';
require 'panel/controller/Usuario.php';
ob_end_clean();
$error = $_REQUEST['error'];
if (true == $error) {
    $msg = $_REQUEST['msg'];
    ?>
    <div class="alert alert-danger" id="alerta">
        <button type="button" class="close" data-dismiss="alert"></button>
        <?= $msg ?>
    </div><?php
}
?>
<style type="text/css">
    .navbar-nav li:last-child{
        background-image:none;
    }
</style>
<div class="navbar navbar-default yamm sticky_header" role="navigation">
    <div class="form-panel">
        <span class="glyphicon glyphicon-remove close_form_panel"></span>
        <form class="form-inline" role="form" name="loginUser" id="loginUser">
            <div class="container">
                <div class="col-md-6">
                    <h4>INGRESE CON SU CUENTA</h4>
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" name="nombreu"
                                   placeholder="Enter email" required id='nombreu'>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="exampleInputPassword2">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2"
                               placeholder="Password" name="contrasenia" required>
                    </div>
                    <button type="button" id='loginButton' class="btn btn-default">Entrar</button>
                    <div class="div_opciones_login">
                        <div class="checkbox">
                            <input id="rep" checked="" type="checkbox">
                            <label for="rep"><span></span>&nbsp;&nbsp;Mantenerme conectado</label>
                        </div>
                        <span class="recordar_pass"><a href="#" class="link_recordar_pass">&iquest;Olvido su password?</a></span>
                    </div>
                </div>
                <div class="col-md-6" align="right">
                    <span class="cuenta">Crear nueva Cuenta...</span>
                    <button type="button" class="btn btn-default" onclick="window.location = 'register_user.php';">Registro</button>
                    <br/><br/>
                    <button type="button" class="btn btn-green" type="button" onclick="window.location = 'register_businessman.php'">Empresario</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 padding" align="left" id="buttonAction">
                <!--  Código para mostrar el usuario actual-->
                <?php if (empty($_SESSION['g000_id_usuario'])) { ?>
                    <button type="button" class="btn btn-rosa" id="login">Conectarse</button>
                    <?php
                } else {

                    $oDatos = new Datos();
                    $oDatos->Load('id_usuario=' . $_SESSION['g000_id_usuario']);
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-select dropdown-toggle" data-toggle="dropdown" style="padding:0px; border: none!important">
                            <span>
                                <img src="files/usuarios/small/<?= $oDatos->foto; ?>" style="width:32px" ></span>
                            <span class="btn_span">
                                <span class="caret"></span>
                            </span>
                        </button>

                        <ul class="dropdown-menu role_user" role="menu">
                            <li class="dropdown-plus-title">
                                <span><img src="files/usuarios/small/<?= $oDatos->foto; ?>" style="width:32px" ></span>
                                <?= $oDatos->nombre . ' ' . $oDatos->ap; ?>
                                <span class="pull-right glyphicon lett_cerrar"> x </span>
                            </li>
                            <li class="back_li"><a href="#">Mis Citas</a></li>
                            <li class="back_li"><a href="#">Mi Cartera</a></li>
                            <li class="back_li"><a href="/panel/model/logout.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                    <button type="button" class="btn btn-rosa" id="logout" onclick="window.location = 'panel/model/logout.php'">Salir</button>
                <?php } ?>
            </div>
            <form action="search.php" method="post" name="form">
                <div class="col-md-4" align="center">
                    <a href="index.php">
                        <img src="images/Logo_BookLine_pink.png" class="logo_sup" alt="Bookline" title="Bookline">
                    </a>
                </div>
                <div class="col-md-4 padding" align="right">
                    <div class="input-group" class="div_search" id="div_busqueda">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-search"></span></div>
                        <input class="form-control sin_line" type="text" id="search" name="q_serv"
                               placeholder="Estoy buscando..." >
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--a class="navbar-brand" href="#"></a-->
        </div>
        <div class="navbar-collapse collapse" style="background-image: none;">
            <ul class="nav navbar-nav" style="background-image: none;"><?php
                $oCategorie = new Categoria();
                $arCategories = $oCategorie->findJoinCategories('cfservicios');
                if (is_array($arCategories)) {
                    foreach ($arCategories as $categorie) {
                        ?>
                        <li class="dropdown yamm-fw">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><?= $categorie['name'] ?></a>
                            <ul class="dropdown-menu">
                                <li class="grid-demo">
                                    <div class="row">
                                        <div class="col-sm-4"><!-- Primera Sección -->
                                            <div class="row" style="padding: 2% 5%;"> <!-- row-->
                                                <div class="col-md-5">
                                                    <?php
                                                    if (file_exists('files/categorias/small/' . $categorie['caracteristica'])) {
                                                        $image = 'files/categorias/small/' . $categorie['caracteristica'];
                                                    } else {
                                                        $image = 'images/sinimagen.jpg';
                                                    }
                                                    ?>
                                                    <a href="#" class="thumbnail">
                                                        <div style="margin: 4%; height:182px;
                                                             width: 90%;
                                                             background-repeat:no-repeat;
                                                             background-position: 50% 50%;
                                                             background-size: 100%;
                                                             background-image: url(<?= $image ?>)">
                                                        </div>
                                                        <!--img src="files/categorias/small/<?= $categorie['caracteristica'] ?>"-->
                                                    </a>
                                                </div>
                                                <div class="col-md-7"><?php
                                                    $arCat = array();
                                                    if (is_array($categorie['list'])) {
                                                        foreach ($categorie['list'] as $cat) {
                                                            ?>
                                                            <a href="search.php?id_categoria=<?= $cat['id'] ?>">
                                                                <?= $cat['name'] ?></a><br />
                                                            <?php
                                                            $arCat[] = $cat['id'];
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8 border-left"><!-- Segunda Sección -->
                                            <?php
                                            $ids = implode(',', $arCat);
                                            $oService = new Servicio();
                                            $arServices = $oService->Find("id_status=1 AND id_categoria IN ($ids) " .
                                                    ' ORDER BY id_servicio DESC LIMIT 3');
                                            if (is_array($arServices)) {
                                                foreach ($arServices as $service) {
                                                    $arImagenes = $service->rel_servicios_imagenes;
                                                    ?><div class="col-md-4 padding">
                                                        <div class="thumbnail _minimo">
                                                            <?php
                                                            if (file_exists('files/servicios/small/' . $arImagenes[0]->path)) {
                                                                $image = 'files/servicios/small/' . $arImagenes[0]->path;
                                                            } else {
                                                                $image = 'images/sinimagen.jpg';
                                                            }
                                                            ?>
                                                            <a href="overview.php?id_servicio=<?= $service->id_servicio ?>">
                                                                <div style="margin: 3%; height:90px;
                                                                     width: 94%;
                                                                     background-repeat:no-repeat;
                                                                     background-position: 50% 50%;
                                                                     background-size: 100%;
                                                                     background-image: url(<?= $image ?>)">
                                                                </div>
                                                                <!--img alt="<?= $service->descripcion ?>"
                                                                     src="files/servicios/small/<?= $arImagenes[0]->path; ?>"-->
                                                                <div class="caption">
                                                                    <div class="titulo_cuadro">- <?= $service->descripcion ?> -</div>
                                                                    <p class="contenido_recuadro">
                                                                        <?= substr(strip_tags($service->detalle), 0, 50) . '...'; ?>
                                                                    </p>
                                                                </div></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li><?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div id="overlay"></div>
<script type="text/javascript">

    $(function() {

        $('#loginButton').click(function() {
            var formData = $("#loginUser").serializeArray();
            $("#loginButton").html('Cargando..');
            $.ajax({
                data: formData,
                type: 'POST',
                dataType: 'script',
                url: 'panel/model/login.php',
                success: function(data) {
                    $('#notification').html(data).fadeIn("slow");
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#loginButton").html('Entrar');
                },
                error: function(data) {
                    $("#loginButton").html('Entrar');
                },
                onChange: function(data) {
                    $('#notification').html(data).fadeIn("slow");
                }
            });
        });
        if (!!$('.sticky_header').offset()) {
            if ($(document).width() > 1024) {
                var stickyTop_panel = $('.sticky_header').offset().top;
                $(window).scroll(function() {
                    var windowTop_panel = $(window).scrollTop();
                    var altura_panel = $(document).height();
                    var a = ($(window).scrollTop() + $(window).height());
                    var b = altura_panel;
                    if (stickyTop_panel < windowTop_panel) {
                        $('.sticky_header').css({position: 'fixed', top: 0, width: '100%', 'z-index': 999999});
                    } else {
                        $('.sticky_header').css({position: 'static', width: '100%'});
                    }
                });
            }
        }
    });
</script>