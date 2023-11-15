function rebuild() {
    // Obtener los valores de los campos de entrada
    document.getElementById('chat-section-container').innerHTML = "";

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            document.getElementById('chat-section-container').innerHTML = this.response;
        }
    };
    xhr.open("POST", "../../php scripts/build-chat.php", true);
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("receiver=" + receiver + "&content=" + content + "&type=" + type);
}
function addMesg() {
    // Obtener los valores de los campos de entrada
    receiver = document.getElementById("info-receiver").value;
    content = document.getElementById("info-content").value;
    type = document.getElementById("info-type").value;

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