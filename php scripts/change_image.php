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
    echo "El archivo " . $url_target . htmlspecialchars(basename($file)) . " ha sido cargado con éxito.";
} else {
    echo "Ha habido un error al cargar tu archivo (" . htmlspecialchars(basename($file)) . ").";
}

$url_target = (str_replace('\\', '/', $url_insert) . '/' . $lastImg);
//Eliminar la imagen anterior
unlink($url_target);

// Conectar a la base de datos
$db = new mysqli("localhost", "castelancarpinteyro", "@CastelanCarpinteyroWEB", "castelancarpinteyro");

$query = "UPDATE `usuarios` SET `img_usuario` = '$file' WHERE (`id_usuario` = ?)";
$stmt = $db->prepare($query);
$stmt->bind_param("i", $_SESSION['id']);
$id = $db->real_escape_string($_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

$db->close();

//header("Location: ../account.php");