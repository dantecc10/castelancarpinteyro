function activarInput(id) {
    // Obtener el elemento input por su ID
    var inputElement = document.getElementById(id);
    var status = inputElement.disabled;

    if (status == false) {
        // Habilitar el input
        inputElement.disabled = false;
    } else {
        // Deshabilitar el input
        inputElement.disabled = true;
    }
}