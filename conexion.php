<?php
function db_connect() {
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "solweb";

    // Conectarse a la base de datos
    $conn = new mysqli($server, $user, $pass, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Imposible conectar con el servidor: " . $conn->connect_error());
    } 

    return $conn;
}
?>
