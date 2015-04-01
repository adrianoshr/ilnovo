<?php
$llave = $_REQUEST['key'];
if (!empty($llave)) {
    $oActivate = new Usuario();
    $res = $oActivate->Load("llave='$llave'");
    if (true == $res) {
        $oActivate->id_status = 1;
        $oActivate->llave = '';
        $oActivate->Save();
        $oActivate->autoLogin();
        $msgA = 'Bienvenido a Bookline, Su Cuenta se Activo con Éxito.';
    } else {
        $msgA = 'Su Clave para Activación ya Caduco.';
    }
    ?>
    <script>
        $(document).ready(function() {
            $.noty.consumeAlert({layout: 'top',
                type: '<?= (true == $error) ? 'warning' : 'success' ?>',
                dismissQueue: true, timeout: 2500});
            alert("<?= $msgA ?>");
            setTimeout('window.location="index.php"', 3000);
        });</script><?php
}
?>