function rebuild() {
    // Obtener los valores de los campos de entrada
    document.getElementById('chat-section-container').innerHTML = "";
    $(document).ready(function() {
        $.ajax({
            url: '../../php scripts/build-chat.php',
            method: 'GET', // Método GET para enviar la solicitud sin variables
            success: function(response) {
                // Insertar la respuesta en el elemento con id="resultado"
                $('#chat-section-container').html(response);
            }
        });
    });
}
function addMsg() {
    // Obtener los valores de los campos de entrada
    receiver = document.getElementById("info-receiver").innerText;
    content = document.getElementsByClassName("info-content")[0].value;
    type = document.getElementById("info-type").innerText;

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText != null) {
                rebuild();
            } else {
                //Manejar errores
            }
        }
    };
    xhr.open("POST", "../../php scripts/add-msg.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("receiver=" + receiver + "&content=" + content + "&type=" + type);
}