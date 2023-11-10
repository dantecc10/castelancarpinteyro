<?php
session_start();
if (isset($_POST)) {
    #Trabajanding

    $actualizar = [];

    $datos = [["username", "usuario"], ["email", "email"], ["first_name", "nombre"], ["last_name1", "apellidoPaterno"], ["last_name2", "apellidoMaterno"], ["emailDominio", "emailDominio"], ["date", "nacimiento"]];

    for ($i = 0; $i < sizeof($datos); $i++) {
        # Agregar un elemento al arreglo en el último índice
        if ($_POST[$datos[$i][0]] != $_SESSION[$datos[$i][1]]) {
            echo ("Compara: " . $_POST[$datos[$i][0]] . " y " . $_SESSION[$datos[$i][1]] . ".<br>");
            array_push($actualizar, [$_POST[$datos[$i][0]], $i, $datos[$i][0], $datos[$i][1]]);
        }
    }

    if (sizeof($actualizar) > 0) {
        echo ("Hay " . sizeof($actualizar) . " campo(s) por actualizar");
        include "dynamicSecrets.php";
        $data = generatePasskey('sql');

        $db = new mysqli("localhost", $data[0], $data[1], $data[2]);
        echo ("Actualizar: <br>");
        for ($i = 0; $i < sizeof($actualizar); $i++) {
            echo ("Campo " . $actualizar[$i][1] . "; '" . $actualizar[$i][0] . "'.<br>");

            $id = $_SESSION['id'];
            $nuevoValor = $_POST[$actualizar[$i][2]];
            $actualValor = $_SESSION[$actualizar[$i][3]];
            $campo = $actualizar[$i][3];
            $comillaSimple = "'";

            switch ($actualizar[$i][1]) {
                case 0:
                    $campo = "nombreUsuario_usuario";
                    break;
                case 1:
                    $campo = "email_usuario";
                    break;
                case 2:
                    $campo = "nombre_usuario";
                    break;
                case 3:
                    $campo = "apellidoPaterno_usuario";
                    break;
                case 4:
                    $campo = "apellidoMaterno_usuario";
                    break;
                case 5:
                    $campo = "email_dominio";
                    break;
                case 6:
                    $campo = "nacimiento_usuario";
                    break;

                default:
                    echo ("¡Error fatal!");
                    break;
            }

            $query = "UPDATE `usuarios` SET `$campo` = ? WHERE (`id_usuario` = ? AND `$campo` = ?)";
            //$query = "SELECT * FROM `auth_keys` WHERE (`auth_key` = ?) AND (`related_email` = ?) AND (`status` = 'Enabled')";
            $stmt = $db->prepare($query);
            if (is_numeric($nuevoValor)) {
                $stmt->bind_param("iii", $nuevoValor, $id, $actualValor);
            } else {
                $stmt->bind_param("sis", $nuevoValor, $id, $actualValor);
            }

            $id = $db->real_escape_string($id);
            $actualValor = $db->real_escape_string($actualValor);
            $nuevoValor = $db->real_escape_string($nuevoValor);

            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                echo "Actualización exitosa. De un dato.";
            } else {
                echo "Error al actualizar: " . $db->error;
            }
            /*
                $id = $_SESSION['id'];

                $query = "UPDATE `usuarios` SET `img_usuario` = '$file' WHERE (`id_usuario` = $id)";

                // Utiliza el método query para ejecutar la consulta
                $result = $db->query($query);

                // Verifica si la consulta se ejecutó con éxito
                if ($result) {
                    echo "Actualización exitosa.";
                    $_SESSION['img'] = ("assets/img/avatar-icons/" . $file);
                } else {
                    echo "Error al actualizar: " . $db->error;
                }
            
                // Cierra la conexión
                $db->close();
            */
        }
        //header("Location: ../account.php?msg=success");
    }
}
