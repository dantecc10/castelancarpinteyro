<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>

<body>
    <?php
    $hack = False;
    ?>
    <form action="InicioSesión.php" method="$_GET">
        <p>
            <label for="email">Usuario o email:</label>
            <input type="email" name="email" required>
        </p>
        <p>
            <label for="contraseña">Contraseña:</label>
            <input type="password" name="contraseña" required>
        </p>
        <input type="submit" value="Enviar" name="BotónEnviar">
    </form>
</body>

</html>