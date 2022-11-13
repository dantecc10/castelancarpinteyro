<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisión de sesión</title>
</head>

<body>
    <?php
    $Acceso;
    include 'Scripts PHP/ConexiónUsuarios.php';

    $sql = "SELECT * FROM usuarios";
    //$result = mysqli_query($conn, $sql);
    $result = mysqli_query($conn, $sql) or die("Error en la consulta a la base de datos");
    // echo ("<p>Usuario o correo: " . $_GET['email'] . "</p>");
    // echo ("<p>Contraseña: " . $_GET['contraseña'] . "</p>");

    while ($columna = mysqli_fetch_array($result)) {
        if (($_GET['email'] == $columna['email']) && ($_GET['contraseña'] == $columna['contraseña'])) {
            $resultadoSesión = ("Bienvenido, " . $columna["nombreUsuario"] . ", has iniciado sesión correctamente.");
            // echo $resultadoSesión;

            $Acceso = True;
            header('Location: ACADÉMICO/ESCOLAR/Tareas.php?Sesión=Iniciada');
        } else {
            $resultadoSesión = "Los datos que introduciste son erróneos.";
            $Acceso = False;
            // echo $resultadoSesión;
        }
    }
    mysqli_close($conn);
    ?>
</body>

</html>