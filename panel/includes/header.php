<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            datatype: "html",
            url: "model/add_cart.php",
            success: function(data) {
                //alert("valor: "+data);
                $('#basket_cart').html(data).fadeIn("slow");
            }
        });
    });
</script>
<header class="page-header main-page">
    <section id="" class="">
        <div class="text_logo" align="center">
            &nbsp;
            <span class="label">Llame a nuestro call center al</span><br />
            <i class="fa fa-phone"></i>
            <span style="">&nbsp;<a href="tel:018002255626" style="font-size:17px">01 800 CALL NAN, </a></span><br />
            &nbsp;<i class="fa fa-phone"></i>
            <span style="">&nbsp;<a href="tel:8181158502" style="font-size:17px">(81) 8115 8502</a></span>
        </div>
    </section>
    <section id="logo" class="logo">
        <div>
            <a href="index.php"><img src="images/nanlaboratorios_logo.png" alt="Clinico"></a>
        </div>
    </section>
    <nav class="main-nav">
        <ul>
            <li>
                <a href="index.php" id="home"><i class="fa fa-home fa_home" style="top:10px!important"></i>
                    <span class="item_menu">Home</span></a>
            </li>
            <li>
                <a href="tienda.php" id="tienda"><i class="fa fa-usd fa_usd" style="top:10px!important"></i>
                    <span class="item_menu">Tienda</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa_user" style="top:10px!important"></i>
                    <span class="item_menu">LogIn</span></a>
            </li>
            <li class="right" id="basket_cart">
                <a href="carrito.php" class="active_shopping_car border_all"><i class="carro_icono">
                        <img src="images/carro.png" width= "30px"></i>
                    <span class="item_menu"> Art.</span></a></li>
    </nav>
    <nav id="mobile-main-nav" class="mobile-main-nav">
        <i class="fa fa-bars"></i><a href="#" class="opener">Navigation</a>
        <ul>
            <li>
                <a href="index.php" class="active"><i class="fa fa-home fa_home" style="top:10px!important"></i>Home</a>
            </li>
            <li>
                <a href="tienda.php"><i class="fa fa-usd fa_usd" style="top:10px!important"></i>Tienda</a>
            </li>
            <li>
                <a href="nosotros.html"><i class="fa fa-certificate fa_certificate" style="top:10px!important"></i>Nosotros</a>
            </li>
            <li class="right">
                <a href="carrito.php"><i class="fa fa-shopping-cart" style="top:10px!important"></i>Carrito</a>
            </li>
            <li>
                <a href="contacts.html"><i class="fa fa-pencil fa_pencil" style="top:10px!important"></i>Contacto</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user fa_user" style="top:10px!important"></i>LogIn</a>
            </li>
        </ul>
    </nav>
    <div class="grid-row grid_row margen_esp fixed_div barra_top" style="margin: 55px 0px auto !important; width:100%; border-top: solid 1px #ccc">
        <div style="width:33.33%; float:left">
            <ul class="myMenu">
                <li><a href="#" style="border-left: solid 1px #ccc; background: rgba(240, 255, 0, 0.30)"><i class="fa fa-heart"></i>&nbsp;Belleza&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                    <ul><?php
                        $product = new Product();
                        $parameters = 'id_category=2 AND  active=1 ORDER BY title ASC ';
                        $arProducts = $product->Find($parameters);
                        if (is_array($arProducts)) {
                            foreach ($arProducts as $oProduct) {
                                ?>
                                <li><a href="detalle.php?id_product=<?= $oProduct->id_product ?>">
                                        <?= $oProduct->title ?>
                                    </a></li><?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="#" style="border-left: solid 1px #ccc; background: rgba(240, 255, 0, 0.25)"><i class="fa fa-flask"></i>&nbsp;Nutrición&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                    <ul><?php
                        $product = new Product();
                        $parameters = 'id_category=1 AND  active=1 ORDER BY title ASC ';
                        $arProducts = $product->Find($parameters);
                        if (is_array($arProducts)) {
                            foreach ($arProducts as $oProduct) {
                                ?>
                                <li><a href="detalle.php?id_product=<?= $oProduct->id_product ?>">
                                        <?= $oProduct->title ?>
                                    </a></li><?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a href="#" style="border-left: solid 1px #ccc; background: rgba(240, 255, 0, 0.20)"><i class="fa fa-stethoscope"></i>&nbsp;Salud&nbsp;&nbsp;<i class="fa fa-caret-down"></i></a>
                    <ul>
                        <?php
                        $product = new Product();
                        $parameters = 'id_category=3 AND  active=1 ORDER BY title ASC ';
                        $arProducts = $product->Find($parameters);
                        if (is_array($arProducts)) {
                            foreach ($arProducts as $oProduct) {
                                ?>
                                <li><a href="detalle.php?id_product=<?= $oProduct->id_product ?>">
                                        <?= $oProduct->title ?>
                                    </a></li><?php
                            }
                        }
                        ?>
                    </ul>
                </li>
            </ul>
        </div>
        <div style="width:33.33%; float:left" align="center">
            <span class="titulo_pagina">Bienvenido</span>
        </div>
        <div style="width:33.33%; float:right" align="right">
            <ul class="myMenu" align="right">
                <li style="visibility:hidden">
                    <a href="#" style="border-left: solid 1px #ccc"></a>
                    <ul>
                        <li><input placeholder="" type="text"></li>
                    </ul>
                </li>
                <li style="visibility:hidden">
                    <a href="#" style="border-left: solid 1px #ccc"></a>
                    <ul>
                        <li><input placeholder="" type="text"></li>
                    </ul>
                </li>
                <li><a href="#" style="border-left: solid 1px #ccc">
                        Buscar&nbsp;&nbsp;<i class="fa fa-search"></i></a>
                    <ul>
                        <li><input placeholder="Buscar Producto..." type="text"></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>