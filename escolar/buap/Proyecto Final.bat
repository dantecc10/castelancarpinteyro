@echo off
color 0a
@echo on
set directorio="ARRIAGA SANCHEZ JESHUA ALEJANDRO-CASTELAN CARPINTEYRO DANTE-CIPRIAN ROMERO MARCO ANTONIO_PROYECTO FINAL_METDOLOGIA DE LA PROGRAMACION"

mkdir %directorio%

cd %directorio%

curl -O "https://castelancarpinteyro.com/escolar/buap/cuadro_comparativo.pdf"

curl -O "https://castelancarpinteyro.com/escolar/buap/pseudocode.pdf"

curl -O "https://castelancarpinteyro.com/escolar/buap/project-code.c"