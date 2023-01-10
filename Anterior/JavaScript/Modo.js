var Revisión = false;
var Objetivo = document.getElementById("EnlacesNavBar");
if (Revisión = true) {
    document.getElementById("Revisión").innerText = "Tareas";
    document.getElementById("Revisión").href = "Tarea/M3S2/indexTarea.html";
    console.log("Bienvenido, docente.");
}
else {
    document.getElementById("Revisión").innerHTML = "";
    console.log("El modo de revisión académica se ha desactivado...");
}