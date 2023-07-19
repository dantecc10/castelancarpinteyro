#include <iostream>
#include <string>
#include <stdlib.h>

using namespace std;
int main() {
	int coordenadaX = 0;
	int coordenadaY = 0;
	int t;

	cin>>t;

	for (int i=0; i<t; i++) {
		string secuencia;
		char comando;

		cin>>secuencia;
		coordenadaX=0;
		coordenadaY=0;

		for (int j=0; j<secuencia.length(); j++) {
			comando = secuencia[j];

			//cin>>comando;
			switch(comando) {
				case 'U':
					coordenadaY = (coordenadaY+1);
					break;
				case 'D':
					coordenadaY = (coordenadaY-1);
					break;
				case 'L':
					coordenadaX = (coordenadaX-1);
					break;
				case 'R':
					coordenadaX = (coordenadaX+1);
					break;
			}

		}
		int movimientosX=0, movimientosY = 0, movimientosTotales= 0;

		if(coordenadaX<0) {
			movimientosX = ((coordenadaX)*(-1));
		} else {
			movimientosX = coordenadaX;
		}

		if(coordenadaY<0) {
			movimientosY = ((coordenadaY)*(-1));
		} else {
			movimientosY = coordenadaY;
		}

		movimientosTotales = movimientosX + movimientosY;
		//Impresión exitosa de coordenadas
		//cout<<"("<<coordenadaX<<", "<<coordenadaY<<"): Los movimientos minimos necesarios son: "<<movimientosTotales<<endl;
		cout<<movimientosTotales<<endl;
	}

}