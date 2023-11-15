function verificarClave() {
    // Obtener los valores de los campos de entrada
    receiver = document.getElementById("info-receiver").value;
    content = document.getElementById("info-content").value;
    type = document.getElementById("info-type").value;

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText == "true") {
                //Manejar valores
            } else {
                //Manejar valores
            }
        }
    };
    xhr.open("POST", "../../php scripts/add-msg.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("receiver=" + receiver + "&content=" + content + "&type=" + type);
}
function rebuild() {
    // Obtener los valores de los campos de entrada
    

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText == "true") {
                //Manejar valores
            } else {
                //Manejar valores
            }
        }
    };
    xhr.open("POST", "../../php scripts/add-msg.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("receiver=" + receiver + "&content=" + content + "&type=" + type);
}