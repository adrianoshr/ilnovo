<?php
//include 'controller/Usuario.php';
$oDataUser = new Datos();
$oDataUser->Load('id_usuario=' . $_SESSION['g000_id_usuario']);
?><header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
    <div class="navbar-header pull-left">
        <a href="<?php echo PATH; ?>panel/s000_panel.php">
            <h3 style="color: #fff"><?= $system_name ?></h3>
        </a>
    </div>
    <ul class="nav navbar-nav pull-right toolbar">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <span class="hidden-xs"><?= $oDataUser->nombre . ' ' . $oDataUser->ap ?>
                    <i class="fa fa-caret-down"></i></span><img src="<?= PATH; ?>panel/assets/img/user_3.png" alt="Dangerfield" /> </a>
            <ul class="dropdown-menu userinfo arrow">
                <li class="username">
                    <a href="#">
                        <div class="pull-left"><img class="userimg" src="<?= PATH; ?>panel/assets/img/user_3.png" alt="<?= $_SESSION['g000_nombreu'] ?>"/></div>
                        <div class="pull-right"><h5><?= $oDataUser->nombre . ' ' . $oDataUser->ap ?></h5><small><span><?= $_SESSION['g000_nombreu'] ?></span></small></div>
                    </a>
                </li>
                <li class="userlinks">
                    <ul class="dropdown-menu">
                        <li><a href="model/logoutPanel.php" class="text-right">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</header>
<div id="page-container">
    <?php include(DIR_PATH . 'panel/snippets/menu.php'); ?>
    <div id="page-rightbar">
        <div id="chatarea">
            <div class="chatinput">
                <textarea name="" rows="2"></textarea>
            </div>
        </div>
    </div>
    <!-- END RIGHTBAR -->