<?php
$conexion = new mysqli("sql207.infinityfree.com", "if0_40817464", "luisevelio065", "if0_40817464_pasteleria33");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
