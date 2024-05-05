<!-- Realizar una página borrar.php que reciba el identificador de cliente y lo elimine de la base de datos. Mostrará un mensaje “Eliminado” y un enlace para regresar al listado. -->

<?php
    include_once "conexion.php";
    $conn = db_connect();
?>

<?php

// Verificar si se ha recibido el ID del cliente a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Recibe el ID del cliente a eliminar

    // Ejecutar la consulta de eliminación
    $query = "DELETE FROM CLIENTES WHERE Id = $id";
    $result = $conn->query($query);

    if ($result) {
        echo "Eliminado<br>";
        echo "<a href='lista.php'>Regresar al listado</a>";
    } else {
        echo "Error al eliminar el cliente";
    }
} else {
    echo "ID de cliente no proporcionado";
}
?>