<div class="grid-col grid-col-3">
    <nav class="bread-crumbs">
        <a href="index.php">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
        <a href="tienda.php">Tienda en Línea</a>
    </nav>
    <br /><br />
    <section class="widget widget-sevices">
        <div class="widget-title">Categorías</div>
        <ul><?php
            $oCategorie = new cfCategoriesProducts();
            $aCategories = $oCategorie->Find('status=1');
            if (is_array($aCategories)) {
                foreach ($aCategories as $categorie) {
                    ?>
                    <li><i class="fa fa-bookmark"></i>
                        <a href="tienda.php?id_categorie=<?= $categorie->idcf ?>">
                            <i class="fa fa-angle-right"></i><?= $categorie->nodename ?>
                        </a>
                    </li><?php
                }
            }
            ?>
        </ul>
    </section>
    <section class="widget widget-tags">
        <div class="widget-title">Tags</div>
        <ul>
            <li><a href="#">Salud</a></li>
            <li><a href="#">Belleza</a></li>
            <li><a href="#">Suplemento</a></li>
            <li><a href="#">Alimentación</a></li>
            <li><a href="#">Corazón</a></li>
            <li><a href="#">Cremas</a></li>
            <li><a href="#">Bienestar</a></li>
            <li><a href="#">Rejuvenecedor</a></li>
            <li><a href="#">Perder peso</a></li>
            <li><a href="#">Thermatrim</a></li>
        </ul>
    </section>
</div>
