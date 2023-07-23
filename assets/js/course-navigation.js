function courseNavigate(lesson) {
    var lastParameterCharacter = "";

    // Variable tipo string que permite dinamizar el contenido visible y estilizar los índices
    /*
    Formato de clases (barra lateral):
    - lateralP
    - lateralT
    - lateralN (N es el número de lección)
    - lateralE
    - lateralC

    Formato de clases (cinta de navegación):
    - cintaP
    - cintaT
    - cintaN (N es el número de lección)
    - cintaE
    - cintaC
    */
    //lastParameterCharacter es el último caracter en lesson
    //Saber si lesson.charAt(length(lesson) - 1) es un número
    lastParameterCharacter = lesson.charAt((lesson.length) - 1); // Operative ✅

    var prefix = '';
    for (var i = 0; i < ((lesson.length) - 1); i++) {
        prefix += lesson.charAt(i);
    }
    console.log("Este es el prefijo del objeto: " + prefix); // Debug 🐞

    if (parseInt(lastParameterCharacter)) {
        console.log(lastParameterCharacter);
    } else {
        console.log("No es un número"); // Debug 🐞
        switch (lastParameterCharacter) {
            case 'P':
                console.log("Se hace referencia a la presentación."); // Debug 🐞
                break;
            case 'T':
                console.log("Se hace referencia al temario."); // Debug 🐞
                break;
            case 'E':
                console.log("Se hace referencia a la evaluación."); // Debug 🐞
                break;
            case 'C':
                console.log("Se hace referencia al certificado."); // Debug 🐞
                break;

            default:
                console.log("No se ha encontrado ninguna opción."); // Debug 🐞
        }
    }
}