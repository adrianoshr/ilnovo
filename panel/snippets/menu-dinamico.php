<div id="page-container">
    <nav id="page-leftbar" role="navigation">
        <ul class="acc-menu" id="sidebar">
            <li><a href="o002.php"><i class="fa fa-home"></i> <span>Inicio</span></a>
            </li>
            <li><a href="ca001_calendario.php"><i class="fa fa-calendar"></i> <span>Calendario</span>
                </a>
            </li>
            <li><a href="javascript:;"><i class="fa fa-bar-chart-o"></i> <span>Gráficas</span></a>
                <ul class="acc-menu">
                    <li><a href="gr001.php">Servicios</a></li>
                    <li><a href="gr002.php">Citas por Empleado</a></li>
                    <li><a href="gr004.php">Flujo de Citas</a></li>
                </ul>
            </li>
            <li><a href="equipo_trabajo001_listado.php" id="equipo">
                    <i class="fa fa-group"></i><span>Equipo de Trabajo</span></a></li>
            <li><a href="c001_listado.php"><i class="fa fa-group"></i> <span>Clientes</span></a></li>
            <li id="servicios"><a href="s001_listado.php"><i class="fa fa-bell"></i>
                    <span>Servicios</span></a></li>
            <li><a href="su001_listado.php"><i class="fa fa-building"></i> <span>Sucursales</span></a>
            </li>
            <li><a href="e001_formulario.php"><i class="fa fa-gears"></i> <span>Empresa</span></a></li>
            <?php if (2 == $_SESSION['g000_id_perfil']) { ?>
                <li><a href="javascript:;"><i class="fa fa-wrench"></i> <span>Configuración</span> </a>
                    <ul class="acc-menu">
                        <li><a href="g003_listado_politicas.php">
                                <i class="fa fa-tasks"></i><span>Políticas</span></a></li>
                        <li><a href="g010_indice_catalogos.php"><i class="fa fa-book"></i><span>Catálogos
                                </span></a></li>
                        <li><a href="#"><i class="fa fa-unlock"></i><span>Accesos y Privilegios</span>
                            </a></li>
                        <li><a href="g015_listado_modulos.php"><i class="fa fa-puzzle-piece"></i>
                                <span>Módulos</span></a></li>
                        <li><a href="g002_listado_super_modulos.php"><i class="fa fa-shield"></i><span>
                                    Super Módulos</span></a></li>
                    </ul>
                </li><?php } ?>
        </ul>
    </nav>