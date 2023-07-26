<?php
include "dynamicSecrets.php";
$data = generatePasskey('sql');

$db = new mysqli("localhost", $data[0], $data[1], $data[2]);