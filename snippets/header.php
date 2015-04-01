<a class="show_menu" href="#">menu</a>
<a class="hide_menu" href="#">cerrar menu</a>
<div class="menu">
    <ul id="main_menu">
        <li><a <?= ('index.php' == basename($_SERVER['PHP_SELF'])) ? 'class="selected"' : '' ?> href="index.php">Inicio</a></li>
        <li><a href="acerca-de-il-novo-catering.php">Acerca de</a></li>
        <li><a href="servicios-organizacion-de-eventos-y-bodas-il-novo-catering.php">Servicios</a></li>
        <li><a href="#">Paquetes</a>
            <ul>
                <li><a href="paquete-de-organizacion-de-boda-en-mexico-mi-boda-perfecta.php">Mi boda perfecta</a></li>
            </ul>
        </li>
        <li><a href="fotos-de-decoracion-de-bodas-y-eventos-il-novo-catering.php">Galeria</a></li>
        <li><a href="blog-de-bodas-y-organizacion-de-eventos.php" <?= ('blog-de-bodas-y-organizacion-de-eventos.php' == basename($_SERVER['PHP_SELF'])) ? 'class="selected"' : '' ?>>Blog</a></li>
        <li><a href="cotizacion-para-bodas-y-eventos-mexico.php" <?= ('cotizacion-para-bodas-y-eventos-mexico.php' == basename($_SERVER['PHP_SELF'])) ? 'class="selected"' : '' ?>>Cotización</a></li>
        <li><a href="contacto-il-novo-catering.php">Contacto</a></li>
    </ul>
</div>