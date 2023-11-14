<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        $(':input').keyup(function () {
            $(this).next().focus();
        });

        var inputBox = document.querySelectorAll('input');

        for (var i = 0; i < inputBox.length; i++) {
            inputBox[i].addEventListener('keyup', function (event) {
                var maxLength = parseInt(this.getAttribute('maxlength'));
                var currentLength = this.value.length;

                if (currentLength >= maxLength) {
                    var nextInput = this.nextElementSibling;
                    if (nextInput && nextInput.tagName === 'INPUT') {
                        nextInput.focus();
                    }
                }
            });
        }
    </script>
    <input type="text" id="input1" maxlength="1">
    <input type="text" id="input2" maxlength="1">
    <input type="text" id="input3" maxlength="1">
    <input type="text" id="input4" maxlength="1">
    <input type="text" id="input5" maxlength="1">
    <input type="text" id="input6" maxlength="1">
</body>

</html>