<?php
include("conexion.php");
$res = $conexion->query("SELECT p.id_pedido, c.nombre, c.telefono, p.estado, p.fecha
FROM pedidos p JOIN clientes c ON p.id_cliente=c.id_cliente");
while($f=$res->fetch_assoc()){
echo "<h3>Pedido #{$f['id_pedido']}</h3>";
echo "{$f['nombre']} - {$f['telefono']}<br>";
echo "Estado: {$f['estado']}<br>Fecha: {$f['fecha']}<hr>";
}
?>
