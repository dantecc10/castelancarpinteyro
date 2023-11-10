<?php
if (isset($_POST)) {
    #Trabajanding

    $actualizar = [];

    $datos = [["username", "usuario"], ["email", "email"], ["first_name", "nombre"], ["last_name1", "apellidoPaterno"], ["last_name2", "apellidoMaterno"], ["emailDominio", "emailDominio"], ["date", "nacimiento"]];

    for ($i = 0; $i < sizeof($datos); $i++) {
        # Agregar un elemento al arreglo en el último índice
        if ($_POST[$datos[$i][0]] != $_SESSION[$datos[$i][1]]) {
            echo ("Compara: " . $_POST[$datos[$i][0]] . " y " . $_SESSION[$datos[$i][1]] . ".<br>");
            array_push($actualizar, [$_POST[$datos[$i][0]], $i]);
        }
    }

    if (sizeof($actualizar) > 0) {
        echo ("Hay " . sizeof($actualizar) . " campo(s) por actualizar");
    }



    include "dynamicSecrets.php";
    $data = generatePasskey('sql');

    $db = new mysqli("localhost", $data[0], $data[1], $data[2]);


    //header("Location: ../account.php?msg=success");

}
