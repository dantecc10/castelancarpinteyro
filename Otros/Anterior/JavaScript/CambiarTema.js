function CambiarTema() {
    var Modo = document.getElementById("CambiaTema").textContent;
    console.log("El contenido del <a></a> es: " + Modo);
    switch (Modo) {
        case "Tema claro":
            document.getElementById("EtiquetaCSS").href = "../CSS/CSS GLOBAL - TEMA CLARO.css";
            console.log("Ha establecido el tema claro.");
            document.getElementById("CambiaTema").innerHTML = "Tema oscuro";
            break;
        case "Tema oscuro":
            document.getElementById("EtiquetaCSS").href = "../CSS/CSS GLOBAL - TEMA OSCURO.css";
            console.log("Ha establecido el tema oscuro.");
            document.getElementById("CambiaTema").innerHTML = "Tema claro";
            break;
        case "Cambiar tema":
            document.getElementById("EtiquetaCSS").href = "../CSS/CSS GLOBAL - TEMA CLARO.css";
            console.log("Ha establecido el tema claro, porque al empezar ya estaba en oscuro...");
            document.getElementById("CambiaTema").innerHTML = "Tema oscuro";
            break;
        default:
            console.log("Error fatal al elegir CSS...");
    }
}