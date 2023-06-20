<?php
session_start();


$_SESSION['id'][1] = "56";
$_SESSION['email'][1] = "dantecc10@gmail.com";
$_SESSION['fecha'][1] = "2023-06-19";
$_SESSION['nombre'][1] = "Dante";
$_SESSION['mensaje'][1] = "Ping de script!";

$_SESSION['límite'] = 3;



echo ($_SESSION['id'][1] . "<br>");
echo ($_SESSION['email'][1] . "<br>");
echo ($_SESSION['fecha'][1] . "<br>");
echo ($_SESSION['nombre'][1] . "<br>");
echo ($_SESSION['mensaje'][1] . "<br>");
echo ($_SESSION['límite'] . "<br>");

echo (date('Y-m-d'));