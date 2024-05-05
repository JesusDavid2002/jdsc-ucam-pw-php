<!-- Realizar una página listar.php que muestre todos los clientes en la BD. Se ofrecerán enlaces o botones para la edición o su eliminación. Al hacer click sobre la eliminación se mostrará un
mensaje “¿Confirma eliminación del usuario NOMBRE?” -->

<?php
    include_once "conexion.php";
    $conn = db_connect();
?>

<?php

    $query = "SELECT c.Id, c.Nombre as NombreCliente, c.Apellidos as ApellidosCliente, c.Email, e.Nombre as NombreEmpresa 
                    FROM CLIENTES c
                    INNER JOIN EMPRESAS e ON c.IdEmpresa = e.Id
                    ORDER BY c.ID";

    $result = $conn->query($query);

    if (!$result) {
        die("Error al obtener clientes: " . mysqli_error($conn));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de clientes</title>
</head>
<body>
    <h2>Listado de clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Empresa</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        <?php 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['Id'] . "</td>";
                echo "<td>" . $row['NombreCliente'] . "</td>";
                echo "<td>" . $row['ApellidosCliente'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['NombreEmpresa'] . "</td>";
                echo "<td><a href='editar.php?id=" . $row['Id'] . "'>Editar</a></td>";
                echo "<td><a href='eliminar.php?id=" . $row['Id'] . "' onclick='return confirm(\"¿Confirma eliminar este usuario " . $row['NombreCliente'] . "?\")'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No hay clientes en la base de datos</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
