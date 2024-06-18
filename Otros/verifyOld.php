<?php
session_start();

if (isset($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--<script src="jsInputAJAX.js"></script>-->
    <script src="assets/js/jsInputsScript.js"></script>
    <form action="" id="clave">
        <input type="text" id="input1" onkeyup="javascript:codeSend(1);" maxlength="1">
        <input type="text" id="input2" onkeyup="javascript:codeSend(2);" maxlength="1">
        <input type="text" id="input3" onkeyup="javascript:codeSend(3);" maxlength="1">
        <input type="text" id="input4" onkeyup="javascript:codeSend(4);" maxlength="1">
        <input type="text" id="input5" onkeyup="javascript:codeSend(5);" maxlength="1">
        <input type="text" id="input6" onkeyup="javascript:codeSend(6);" maxlength="1">
        <br>
        <hr>
        <input type="text" name="email" id="email" value="<?php echo $email;?>" hidden>
    </form>

    <style>
        .rojo {
            background-color: darkred;
            color: coral;
        }

        .verde {
            background-color: lightgreen;
            color: darkgreen;
        }
    </style>
    <p id="mensaje"></p>
</body>

</html>