<?php
session_start();
function session_chat_store($a, $b, $c, $d, $e, $f, $index)
{
    $_SESSION["chat"][$index] = array($a, $b, $c, $d, $e, $f);
    $_SESSION["chat"]["id_msg"][$index] = $a;
    $_SESSION["chat"]["sender_msg"][$index] = $b;
    $_SESSION["chat"]["receiver_msg"][$index] = $c;
    $_SESSION["chat"]["content_msg"][$index] = $d;
    $_SESSION["chat"]["type_msg"][$index] = $e;
    $_SESSION["chat"]["time_msg"][$index] = $f;
}

$otherUser = 5; // Constante para pruebas, luego dinámico para establecer el chateador
$currentUser = $_SESSION['id'];
$chatUser = $otherUser;

include "dynamicSecrets.php";
$data = generatePasskey('sql');
$conexiónPDO = new mysqli("localhost", $data[0], $data[1], $data[2]);

if ($conexiónPDO->connect_error) {
    die("La conexión a la base de datos falló: " . $conexiónPDO->connect_error);
} else {
    echo "Conexión establecida";
}

$sql = "SELECT * FROM `messages` WHERE (`receiver_msg` = ? AND `sender_msg` = ?) OR (`sender_msg` = ? AND `receiver_msg` = ?)";

$stmt = $conexiónPDO->prepare($sql);
if ($stmt) {
    $stmt->bind_param("iiii", $currentUser, $chatUser, $currentUser, $chatUser);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $i = 0;
        while ($fila = $resultado->fetch_assoc()) {
            #$mensaje[$i]["user"] = $fila["receiver_msg"];
            #$mensaje[$i]["texto"] = $fila["content_msg"];
            #$mensaje[$i]["fecha"] = date("d/m/Y H:i:s", strtotime($fila["fecha"]));
            echo ("<br>" . var_dump($fila) . "<br>");
            $new_id_msg = ("" . $fila["id_msg"] . "");
            $new_receiver_msg = ("" . $fila["receiver_msg"] . "");
            $new_sender_msg = ("" . $fila["sender_msg"] . "");
            $new_content_msg = ("" . $fila["content_msg"] . "");
            $new_type_msg = ("" . $fila["type_msg"] . "");
            $new_time_msg = ("" . $fila["time_msg"] . "");

            //$_SESSION['chat'][$i] = [intval($new_id_msg), strval($new_sender_msg), strval($new_receiver_msg), strval($new_content_msg), strval($new_type_msg)];
            session_chat_store($new_id_msg, $new_sender_msg, $new_receiver_msg, $new_content_msg, $new_type_msg, $new_time_msg, $i);

            $i++;
        }
        $_SESSION['límite'] = $i;
        // Cerrar la conexión a la base de datos
        $stmt->close();
        $conexiónPDO->close();
    } else {
        // Acceso denegado, mostrar un mensaje de error y redireccionar a la página de inicio de sesión
        echo "No tienes un chat con el usuario " . $chatUser;
        echo ($sql);
        //header("Location: ../account.php");
    }
}
