var contador = 0;

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function pause() {
    await sleep(3000); // Pausa de 3 segundosvar contador = 0;

    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
    
    async function pause() {
        await sleep(3000); // Pausa de 3 segundos
    }
    
    function verificarClave(contador) {
        // Obtener los valores de los campos de entrada
        let clave = "";
        for (let i = 1; i <= 6; i++) {
            clave += document.getElementById("input" + i).value;
        }
        let email = document.getElementById("email").value;
        //console.log("Correo: " + email + "\nClave: " + clave); // Debug 🐞
    
        // Crear objeto XMLHttpRequest
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Procesar la respuesta del servidor
                if (this.responseText == "true") {
                    // La clave y el email son válidos
                    //alert("Clave e email válidos"); // Debug 🐞
                    window.location.href = ("login.php?email=" + encodeURI(email)); // Redirección
                } else {
    
                    if (this.responseText == "false") {
                        // La clave o el email no son válidos
                        // Aquí puedes agregar código para manejar una clave o email no válidos
                        alert("Clave o email no válidos"); // Debug 🐞
                    } else {
                        alert("La clave de verificación se ha inhabilitado por el número de intentos. Generaremos una nueva."); // Debug 🐞
                        pause(); // Pausa
                        window.location.href = ("../../php scripts/auth_key.php?email=" + encodeURI(email)); // Redirección
                    }
                }
            }
        };
        xhr.open("POST", "../../php scripts/jsInputPHP.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("clave=" + clave + "&email=" + email + "&tries=" + contador);
    }
    
    function codeSend(index) {
        if (index < 6) {
            var id = "input";
            if (document.getElementById((id + index)).value != '') {
                id += (index + 1); // Siguiente input
                document.getElementById(id).focus();
                document.getElementById(id).select();
                //console.log("Se escribió en el input " + index + " y se pasó al index " + (index + 1)); // Debug 🐞
            } else {
                if (index > 1) {
                    id += (index - 1); // Anterior input
                    document.getElementById(id).focus();
                    document.getElementById(id).select();
                    //console.log("Se escribió en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
                }
            }
        } else {
            // Poner las instrucciones para cuando es el input 6 y se debería enviar el form
            if (document.getElementById('input6').value != '') {
                //console.log("Se escribió en el 6."); // Debug 🐞
                // document.getElementById("clave").submit();
                if (contador > 5) {
                    // Código AJAX para deshabilitar la clave de recuperación y generar una nueva (seguridad)
                } else {
                    contador++;
                    //console.log("Se escribió en el 6."); // Debug 🐞
                    verificarClave(contador); // Se invoca la función al escribirse algo en el campo 6 (asumiendo que todos los demás se llenaron)
                }
            }
            else {
                id = "input";
                id += (index - 1); // Anterior input
                document.getElementById(id).focus();
                document.getElementById(id).select();
                //console.log("Se borró en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
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
}

function verificarClave(contador) {
    // Obtener los valores de los campos de entrada
    let clave = "";
    for (let i = 1; i <= 6; i++) {
        clave += document.getElementById("input" + i).value;
    }
    let email = document.getElementById("email").value;
    //console.log("Correo: " + email + "\nClave: " + clave); // Debug 🐞

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText == "true") {
                // La clave y el email son válidos
                //alert("Clave e email válidos"); // Debug 🐞
                window.location.href = ("login.php?email=" + encodeURI(email)); // Redirección
            } else {

                if (this.responseText == "false") {
                    // La clave o el email no son válidos
                    // Aquí puedes agregar código para manejar una clave o email no válidos
                    alert("Clave o email no válidos"); // Debug 🐞
                } else {
                    alert("La clave de verificación se ha inhabilitado por el número de intentos. Generaremos una nueva."); // Debug 🐞
                    pause(); // Pausa
                    window.location.href = ("../../php scripts/auth_key.php?email=" + encodeURI(email)); // Redirección
                }
            }
        }
    };
    xhr.open("POST", "../../php scripts/jsInputPHP.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("clave=" + clave + "&email=" + email + "&tries=" + contador);
}

function codeSend(index) {
    if (index < 6) {
        var id = "input";
        if (document.getElementById((id + index)).value != '') {
            id += (index + 1); // Siguiente input
            document.getElementById(id).focus();
            document.getElementById(id).select();
            //console.log("Se escribió en el input " + index + " y se pasó al index " + (index + 1)); // Debug 🐞
        } else {
            if (index > 1) {
                id += (index - 1); // Anterior input
                document.getElementById(id).focus();
                document.getElementById(id).select();
                //console.log("Se escribió en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
            }
        }
    } else {
        // Poner las instrucciones para cuando es el input 6 y se debería enviar el form
        if (document.getElementById('input6').value != '') {
            //console.log("Se escribió en el 6."); // Debug 🐞
            // document.getElementById("clave").submit();
            if (contador > 5) {
                // Código AJAX para deshabilitar la clave de recuperación y generar una nueva (seguridad)
            } else {
                contador++;
                //console.log("Se escribió en el 6."); // Debug 🐞
                verificarClave(contador); // Se invoca la función al escribirse algo en el campo 6 (asumiendo que todos los demás se llenaron)
            }
        }
        else {
            id = "input";
            id += (index - 1); // Anterior input
            document.getElementById(id).focus();
            document.getElementById(id).select();
            //console.log("Se borró en el input " + index + " y se pasó al index " + (index - 1)); // Debug 🐞
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