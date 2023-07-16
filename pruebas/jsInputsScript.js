function verificarClave() {
    // Obtener los valores de los campos de entrada
    let clave = "";
    for (let i = 1; i <= 6; i++) {
        clave += document.getElementById("input" + i).value;
    }
    let email = document.getElementById("email").value;
    console.log("Correo: " + email + "\nClave: " + clave); // Debug 🐞

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText == "true") {
                // La clave y el email son válidos
                // Aquí puedes agregar código para manejar una clave y email válidos
                alert("Clave y email válidos");
            } else {
                // La clave o el email no son válidos
                // Aquí puedes agregar código para manejar una clave o email no válidos
                alert("Clave o email no válidos");
            }
        }
    };
    xhr.open("POST", "jsInputPHP.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("clave=" + clave + "&email=" + email);
}
function codeSend(index) {
    if (index < 6) {
        var id = "input";
        if (document.getElementById((id + index)).value != '') {
            id += (index + 1); // Siguiente input
            document.getElementById(id).focus();
            console.log("Se escribió en el input " + index + " y se pasó al index " + (index + 1)); // Debug 🐞
        } else {
            if (index > 1) {
                id += (index - 1); // Anterior input
                document.getElementById(id).focus();
                console.log("Se escribió en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
            }
        }
    } else {
        // Poner las instrucciones para cuando es el input 6 y se debería enviar el form
        if (document.getElementById('input6').value != '') {
            console.log("Se escribió en el 6."); // Debug 🐞
            // document.getElementById("clave").submit();
            verificarClave();
            console.log("Se escribió en el 6."); // Debug 🐞
        }
        else {
            id = "input";
            id += (index - 1); // Anterior input
            document.getElementById(id).focus();
            console.log("Se borró en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
        }
    }
}
        /*function borro() {
document.addEventListener("keydown", function (event) {
if (event.key === "Delete") {
// Se presionó la tecla de borrar (Delete)
console.log("Se presionó la tecla de borrar");
// Realiza aquí las acciones que deseas realizar cuando se presiona la tecla de borrar
}
});
}*/
