export function codeSend(index) {
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
import { verificarClave } from "./jsInputAJAX";
