<?php
require 'connection.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $query = "INSERT INTO `tb_data` VALUES('', '$name', '$email', '$latitude', '$longitude')";
    mysqli_query($conn, $query);

    echo
    "
    <script>
    alert('Datos añadidos exitosamente');
    document.location.href = 'data.php';
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body onload="getLocation();">
    <form class="myForm" action="" method="POST" autocomplete="off">
        <label for="name">Name</label>
        <input type="text" name="name" required value=""><br>
        <label for="email">Email</label>
        <input type="email" name="email" required value=""><br>
        <input type="hidden" name="latitude" value="">
        <input type="hidden" name="longitude" value="">
        <button type="submit" name="submit">Submit</button>
    </form>
    <script type="text/javascript" lang="javascript">
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            document.querySelector('.myForm input[name = "latitude"]').value = position.coords.latitude;
            document.querySelector('.myForm input[name = "longitude"]').value = position.coords.longitude;
        }

        function showError(errror) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("You must allow the requiquest for geolocation tofill the form");
                    break;

                default:
                    break;
            }
        }
    </script>
    <br>
    <a href="data.php">Database Page</a>
</body>

</html>