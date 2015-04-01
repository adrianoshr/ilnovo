<?php
ob_start();
require '../includes/mainfile.php';
include 'stadistics.php';
ob_end_clean();
foreach ($_REQUEST as $key => $var) {
    $$key = $_REQUEST[$key];
}
$id_empresa = $_SESSION['id_empresa'];
$qrEmpleado = "SELECT sys_usuarios.id_usuario, CONCAT(datos.nombre,' ', datos.ap,' ', datos.am) as nombre,"
        . " COUNT(citas.id_cita)"
        . ' FROM usuario INNER JOIN datos ON sys_usuarios.id_datos=datos.id_datos '
        . ' LEFT JOIN citas ON sys_usuarios.id_usuario=citas.id_empleado '
        . ' INNER JOIN servicio ON citas.id_servicio=servicio.id_servicio'
        . " WHERE id_perfil='3' ";
if (!empty($id_empresa)) {
    $qrEmpleado.=" AND servicio.id_empresa='$id_empresa'";
}
$qrEmpleado.= " GROUP BY sys_usuarios.id_usuario ORDER BY COUNT(citas.id_cita)";

$arEmpleados = employeeStadistics($fecha, $id_empleado);
?>
<form name="formEmpleados" id="formEmpleados">
    <input type="hidden" name="empleadoEstadistica" id="empleadoEstadistica" value="<?= $arEmpleados[0]; ?>">
    <input type="hidden" name="empleadoLabel" id="empleadoLabel" value="<?= $arEmpleados[1]; ?>">
    <input type="hidden" name="pendientes" id="pendientes" value="<?= $arEmpleados[3]; ?>">
    <input type="hidden" name="concluidos" id="concluidos" value="<?= $arEmpleados[4]; ?>">
    <input type="hidden" name="cancelados" id="cancelados" value="<?= $arEmpleados[5]; ?>">
    <div class="header_interno" align="left"><span class="verde verdana">Citas por Empleado</span></div>
    <div class="box_interno"></div>
</form>
<canvas id="cvs_empleados">[No canvas support]</canvas>
<div class="box_interno_blanco citas_overflow"></div>
