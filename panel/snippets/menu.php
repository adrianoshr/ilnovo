<div id="page-container">
    <!-- BEGIN SIDEBAR -->
    <nav id="page-leftbar" role="navigation">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="acc-menu" id="sidebar">
            <li><a href="s000_panel.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li><?php
            $id_perfil = $_SESSION['g000_id_perfil'];
            $qrSModulo = 'SELECT DISTINCT sys_supermodulos.id_supermodulo,sys_supermodulos.descripcion,'
                    . ' sys_supermodulos.nombre,sys_supermodulos.imagen '
                    . ' FROM sys_supermodulos '
                    . ' INNER JOIN sys_modulos '
                    . ' ON sys_modulos.id_supermodulo=sys_supermodulos.id_supermodulo '
                    . ' INNER JOIN sys_modulo_has_perfiles ON '
                    . ' sys_modulo_has_perfiles.id_modulo=sys_modulos.id_modulo '
                    . " WHERE sys_modulo_has_perfiles.id_perfil='$id_perfil' "
                    . ' ORDER BY sys_supermodulos.orden ASC';
            $rsSModulo = $db->CacheExecute($qrSModulo)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
            if (!$rsSModulo->EOF) {
                while (list($id_supermodulo, $sDescripcion, $sNombre, $sIcono) = $rsSModulo->FetchRow()) {
                    ?><li class="hasChild <?= (8 == $id_supermodulo) ? '' : ''; ?>">
                        <a href="#" title="<?= $sDescripcion ?>">
                            <i class="<?= $sIcono ?>"></i><span><?= $sNombre ?></span></a>
                        <ul class="acc-menu" style="<?= (8 == $id_supermodulo) ? 'display: none;' : '' ?>"><?php
                            $qrModulos = 'SELECT DISTINCT sys_modulos.id_modulo,sys_modulos.nombre,'
                                    . ' sys_modulos.descripcion,sys_modulos.imagen,sys_modulos.liga '
                                    . ' FROM sys_modulos '
                                    . ' INNER JOIN sys_modulo_has_perfiles ON '
                                    . ' sys_modulo_has_perfiles.id_modulo=sys_modulos.id_modulo '
                                    . " WHERE sys_modulo_has_perfiles.id_perfil='$id_perfil' "
                                    . " AND id_supermodulo='$id_supermodulo' "
                                    . ' ORDER BY sys_modulos.orden ASC';
                            $rsModulos = $db->CacheExecute($qrModulos)or trigger_error($db->ErrorMsg(), E_USER_ERROR);
                            if (!$rsModulos->EOF) {
                                while (list($id_modulo, $mNombre,
                                $mDescripcion, $mIcono, $mLink) = $rsModulos->FetchRow()) {
                                    ?><li>
                                        <a href="<?= $mLink ?>" title="<?= $mDescripcion ?>">
                                            <i class="<?= $mIcono ?>"></i><span>
                                                <?= $mNombre ?></span>
                                        </a>
                                    </li><?php
                                }
                            }
                            ?></ul>
                    </li><?php
                }
            }
            ?></ul>
    </nav>