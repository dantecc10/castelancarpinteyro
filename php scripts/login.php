<?php
include "Conexión.php";
$username = mysqli_real_escape_string($conexiónPDO, $_POST['username']);
$password = mysqli_real_escape_string($conexiónPDO, $_POST['password']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>