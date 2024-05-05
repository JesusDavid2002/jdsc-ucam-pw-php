<!-- Crear una página validar.php que compruebe si usuario y password son “admin” y “admin” respectivamente. Se saltará automáticamente a listar.php -->

<?php
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifica si el usuario y la contraseña son correctos
    if ($username === "admin" && $password === "admin") {
        header("Location: lista.php");
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
?>
