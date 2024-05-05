<!-- Crear una página de login.php que solicite usuario y password. Con JavaScript se validará que son no vacíos -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea PHP-PW</title>
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (username == "" || password == "") {
                alert("Por favor, introduce un usuario y una contraseña.");
                return false;
            }
        }
    </script>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form action="validar.php" method="POST" onsubmit="return validateForm()">
        Usuario: <input type="text" id="username" name="username"><br>
        Contraseña: <input type="password" id="password" name="password"><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>