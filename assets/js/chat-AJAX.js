function rebuild() {
    // Obtener los valores de los campos de entrada
    document.getElementById('chat-section-container').innerHTML = "";
    $(document).ready(function () {
        $.ajax({
            url: '../../php scripts/build-chat.php',
            method: 'GET', // Método GET para enviar la solicitud sin variables
            success: function (response) {
                // Insertar la respuesta en el elemento con id="resultado"
                $('#chat-section-container').html(response);
            }
        });
    });
}
function addMsg() {
    // Obtener los valores de los campos de entrada
    receiver = document.getElementById("info-receiver").innerText;

    content = document.getElementById("info-content").value;
    type = document.getElementById("info-type").innerText;

    if (content != "") {
        // Crear objeto XMLHttpRequest
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Procesar la respuesta del servidor
                if (this.responseText != null) {
                    rebuild();
                    setEvents();
                }
            }
        };
        xhr.open("POST", "../../php scripts/add-msg.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("receiver=" + receiver + "&content=" + content + "&type=" + type);
    }else{
        //console.log("No se escribió nada.");
    }
}

function selectChat(x) {
    var chat_id = document.getElementById('info-receiver');
    chat_id.innerText = x;
    rebuild();
}

window.addEventListener("load", function () {
    // Encuentra el div del chat por su ID
    var chatDiv = document.getElementById("chatDiv");

    // Haz scroll hacia abajo, al final del div
    chatDiv.scrollTop = chatDiv.scrollHeight;
});