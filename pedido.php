<?php
include("conexion.php");
$clientes = $conexion->query("SELECT * FROM clientes");
$productos = $conexion->query("SELECT * FROM productos");
?>
<form method="POST">
Cliente:
<select name="cliente">
<?php while($c = $clientes->fetch_assoc()) { ?>
<option value="<?= $c['id_cliente'] ?>"><?= $c['nombre'] ?></option>
<?php } ?>
</select><br>
Estado:
<select name="estado">
<option>Recepcionado</option>
<option>Despachado</option>
</select><br>
<?php while($p = $productos->fetch_assoc()) { ?>
<?= $p['nombre'] ?> (<?= $p['peso'] ?>):
<input type="number" name="producto[<?= $p['id_producto'] ?>]" min="0"><br>
<?php } ?>
<button type="submit">Guardar Pedido</button>
</form>
<?php
if ($_POST) {
    $conexion->query("INSERT INTO pedidos (id_cliente, estado, fecha)
    VALUES ({$_POST['cliente']}, '{$_POST['estado']}', CURDATE())");
    $id_pedido = $conexion->insert_id;
    foreach ($_POST['producto'] as $id => $cant) {
        if ($cant > 0) {
            $conexion->query("INSERT INTO detalle_pedido (id_pedido, id_producto, cantidad)
            VALUES ($id_pedido, $id, $cant)");
        }
    }
    echo "Pedido registrado";
}
?>
