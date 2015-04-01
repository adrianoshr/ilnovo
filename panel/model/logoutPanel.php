<?php

require('../includes/main.php');
foreach (array_keys($_SESSION) as $key) {
    $_SESSION[$key] = false;
}
session_destroy();
$msg = urlencode('Su Sesión se Cerro Correctamente');
header("Location: ../index.php?msg=$msg");
exit;
?>