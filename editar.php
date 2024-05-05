<!-- Realizar una página guardar.php que reciba los datos de la edición y los guarde en la base de datos. Mostrará un mensaje “Guardado” y un enlace para regresar al listado -->
<?php
    include_once "conexion.php";
    $conn = db_connect();
?>

<?php

// Verificar si se ha enviado el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];

    // Actualizar los datos en la base de datos
    $query = "UPDATE CLIENTES SET Nombre = '$nombre', Apellidos = '$apellidos', Email = '$email' WHERE Id = $id";
    $result = $conn->query($query);

    if ($result) {
        echo "Guardado<br>";
        echo "<a href='lista.php'>Regresar al listado</a>";
    } else {
        echo "Error al guardar los cambios";
    }
} else {
    // Si no se ha enviado el formulario, muestra el formulario de edición
    $id = $_GET['id']; // Recibe el ID del cliente a editar

    // Obtener los datos del cliente
    $query = "SELECT * FROM CLIENTES WHERE Id = $id";
    $result = $conn->query($query);
    $cliente = $result->fetch_assoc();

    // Muestra el formulario de edición
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $cliente['Id']; ?>">
        Nombre: <input type="text" name="nombre" value="<?php echo $cliente['Nombre']; ?>"><br>
        Apellidos: <input type="text" name="apellidos" value="<?php echo $cliente['Apellidos']; ?>"><br>
        Email: <input type="text" name="email" value="<?php echo $cliente['Email']; ?>"><br>
        <input type="submit" value="Guardar">
    </form>
    <?php
}
?>