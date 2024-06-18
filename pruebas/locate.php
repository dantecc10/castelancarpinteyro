<?php
$ip = $_SERVER['REMOTE_ADDR'];
echo $ip;
?>
<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        var ip = "<?php echo $ip; ?>";

        function locate() {
            var latitude;
            var longitude;

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }

            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            if (latitude != "" || latitude != null) {
                var urlCompuesta, urlVariables = ("?ip=" + ip + "&latitude=" + latitude + "&longitude=" + longitude),
                    uriPHP = "manageLocation.php";
                urlCompuesta = (uriPHP + urlVariables);

                //Petición AJAX
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        //document.getElementById(spanObjetivo).innerHTML = this.responseText;
                        var mensaje = this.responseText;
                    }
                };

                //Procesamiento AJAX
                xmlhttp.open("GET", urlCompuesta, true);
                console.log("URL: " + urlCompuesta + "\nURL Variables: " + urlVariables);
                //console.log("ModoFiltro: " + ModoFiltro);
                xmlhttp.send();

            } else {
                mensaje = "¡Error en el AJAX!";
            }
        }

        locate();

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("Por seguridad, debes permitir el acceso a la ubicación para iniciar sesión.");
                    break;
                default:
                    break;
            }
        }


        /*switch (operación) {
            case "alta":
                // document.getElementById(spanObjetivo).innerHTML = "";
                console.log("Se solicitó un alta en la cantidad " + claveObjetivo + " a: " + (cantidadObjetivoActual + 1));
                document.getElementById(spanObjetivo).innerHTML = ("" + (cantidadObjetivoActual + 1));

                bajaAltaSQL(claveObjetivo, cantidadObjetivoActual, "alta");
                break;
            case "baja":
                // document.getElementById(spanObjetivo).innerHTML = "";
                console.log("Se solicitó una baja en la cantidad " + claveObjetivo + " a: " + (cantidadObjetivoActual - 1));
                document.getElementById(spanObjetivo).innerHTML = ("" + (cantidadObjetivoActual - 1));

                bajaAltaSQL(claveObjetivo, cantidadObjetivoActual, "baja");
                break;
            default:
                console.error("Error al recibir el valor del parámetro 'operación'.");
                break;
        }*/
    </script>
</head>

<body>
    <iframe src="https://iplookup.easy365manager.com/iplookup" height="400"></iframe>
</body>

</html>