function activarInput(id) {
    // Obtener el elemento input por su ID
    var inputElement = document.getElementById(id);
    var status = inputElement.disabled;
    inputElement.disabled = false;
}