<?php
session_start();
$file = $_FILES["Ícono"]["name"];
$lastImg = $_POST['src'];

$url_temp = $_FILES["Ícono"]["tmp_name"]; //Ruta temporal a donde se carga el archivo 

//dirname(__FILE__) nos otorga la ruta absoluta hasta el archivo en ejecución
$url_insert = (dirname(__FILE__, 2) . "/assets/img/avatar-icons/"); //Carpeta donde subiremos nuestros archivos

//Ruta donde se guardara el archivo, usamos str_replace para reemplazar los "\" por "/"
$url_target = str_replace('\\', '/', $url_insert) . '/' . $file;

//Si la carpeta no existe, la creamos
if (!file_exists($url_insert)) {
    mkdir($url_insert, 0777, true);
};

//movemos el archivo de la carpeta temporal a la carpeta objetivo y verificamos si fue exitoso
if (move_uploaded_file($url_temp, $url_target)) {
    echo "El archivo " . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";

    $url_target = (str_replace('\\', '/', $url_insert) . '/' . $lastImg);
    //Eliminar la imagen anterior
    unlink($url_target);

    // Crear la conexión
    include "dynamicSecrets.php";
    $data = generatePasskey('sql');

    //$conexión = mysqli_connect("localhost", $data[0], $data[1], $data[2]);

    $db = new mysqli("localhost", $data[0], $data[1], $data[2]);
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
    header("Location: ../account.php");
} else {
    if (($file == null) || ($file == "")) { # code...
        header("Location: ../account.php?msg=no-photo");
    } else {
        echo "Ha habido un error al cargar tu archivo (" . htmlspecialchars(basename($file)) . ").";
    }
}
