<?php include("conexion.php"); ?>
<form method="POST">
Nombre: <input type="text" name="nombre" required><br>
Teléfono: <input type="text" name="telefono" required><br>
<button type="submit">Guardar Cliente</button>
</form>
<?php
if ($_POST) {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $conexion->query("INSERT INTO clientes (nombre, telefono) VALUES ('$nombre','$telefono')");
    echo "Cliente registrado correctamente";
}
?>
