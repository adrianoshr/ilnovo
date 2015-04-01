<?php
include 'snippets/header-focused.php';
unset($_SESSION['return-page']);
?><div class="verticalcenter" style="text-align:center">
    <a href="../index.php">
        <img src="<?= PATH ?>images/logo-ilnovo.png" alt="Logo" class="" />
    </a>
    <div class="panel panel-primary">
        <div class="panel-body">
            <h4 class="text-center" style="margin-bottom: 25px;">Bienvenido al Panel</h4>
            <form  class="form-horizontal" style="margin-bottom: 0px !important;" id="booklineAccess">
                <input type="hidden" name="lugar" value="panel">
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" id="nombreu" placeholder="Ingrese su cuenta de usuario" required name="nombreu">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="contrasenia" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <a id="renewPass" class="pull-left btn btn-link" style="padding-left:0">¿Olvido su Contraseña?</a>
            <div class="pull-right">
                <a  class="btn btn-primary" id="loginButton">Entrar</a>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='<?= PATH; ?>panel/assets/js/bootstrap.min.js'></script>
<script src="<?= PATH; ?>assets/js/noty/js/noty/packaged/jquery.noty.packaged.js" type="text/javascript"></script>
<script type='text/javascript' src='<?= PATH; ?>panel/assets/js/jqueryui-1.10.3.min.js'></script>
<script src="<?= PATH; ?>panel/assets/plugins/bootbox/bootbox.min.js" type="text/javascript"></script><script type="text/javascript">
    $(function () {
        $("#nombreu, #password").keypress(function (e) {
            if (e.which == 13) {
                $("#loginButton").trigger("click");
            }
        });
        $('#loginButton').click(function () {
            var formData = $("#booklineAccess").serializeArray();
            $("#loginButton").html('Cargando..');
            $.ajax({
                data: formData,
                type: 'POST',
                dataType: 'script',
                url: 'model/login.php',
                success: function (data) {
                    $('#notification').html(data).fadeIn("slow");
                    $('html, body').animate({scrollTop: 0}, 'slow');
                    $("#loginButton").html('Entrar');
                },
                error: function (data) {
                    $("#loginButton").html('Entrar');
                },
                onChange: function (data) {
                    $('#notification').html(data).fadeIn("slow");
                }
            });
        });
        $('#renewPass').click(function () {
            bootbox.prompt("Por favor Ingrese su Cuenta de E-mail de Usuario",
                    function (result) {
                        if (result !== null) {
                            $.ajax({
                                data: 'email=' + result,
                                type: 'POST',
                                dataType: 'script',
                                url: 'model/reset_password.php',
                                success: function (data) {
                                    $('#notification').html(data).fadeIn("slow");
                                    $('html, body').animate({scrollTop: 0}, 'slow');
                                    $("#loginButton").html('Entrar');
                                },
                                error: function (data) {
                                    $("#loginButton").html('Entrar');
                                },
                                onChange: function (data) {
                                    $('#notification').html(data).fadeIn("slow");
                                }
                            });
                        }
                    });
        });

    });
</script>
</body>
</html>