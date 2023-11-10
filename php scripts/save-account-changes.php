<?php
if (isset($_POST)) {
    #Trabajanding


}

include "dynamicSecrets.php";
$data = generatePasskey('sql');

$db = new mysqli("localhost", $data[0], $data[1], $data[2]);

if ($_POST["username"] != $_SESSION["usuario"]) {
    # code...
}


header("Location: ../account.php?msg=success");