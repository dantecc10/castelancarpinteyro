let clave, email;
function verificarClave(clave, email) {
    // Obtener los valores de los campos de entrada
    /*let clave = "";
    for (let i = 1; i <= 6; i++) {
        clave += document.getElementById("input" + i).value;
    }
    let email = document.getElementById("email").value;*/
    console.log("Correo: " + email + "\nClave: " + clave); // Debug 🐞

    // Crear objeto XMLHttpRequest
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Procesar la respuesta del servidor
            if (this.responseText == "true") {
                // La clave y el email son válidos
                // Aquí puedes agregar código para manejar una clave y email válidos
                console.log("Clave y email válidos");
            } else {
                // La clave o el email no son válidos
                // Aquí puedes agregar código para manejar una clave o email no válidos
                console.log("Clave o email no válidos");
            }
        }
    };
    xhr.open("POST", "jsInputPHP.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("clave=" + clave + "&email=" + email);
}