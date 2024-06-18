#include <iostream>
#include <stdlib.h>
#include <string>

using namespace std;
int t;
int main() {
	cin>>t;
	for (int i=0; i<t; i++) {
		string cadena;
		char caracter;

		int a = 0, b = 0, c = 0;
		int rebanadasIniciales[] = {0, 0, 0};
		int rebanadasJustas;
		cin>>rebanadasIniciales[1];
		cout<<endl;
		cin>>rebanadasIniciales[2];
		cout<<endl;
		cin>>rebanadasIniciales[3];
		cout<<endl;

		int total;

		total = (a+b+c);
		rebanadasJustas = (total/3);
		int contador = 0;
		
		std::sort(rebanadasIniciales[1], rebanadasIniciales[2], rebanadasIniciales[3]);
		
		for (int j=0; j<3; j++) {
			int comparador=rebanadasIniciales[j];
			/*switch(comparador) {
				case (comparador=rebanadasJustas):

					break;
				case (comparador<rebanadasJustas):

					break;
				case (comparador>rebanadasJustas):
					
					break;
			}*/
		}
	}
}

/*

int longitud = cadena.length();
	int contador=0;
	int superContador=0;
	for (int j=0; j<longitud; j++) {
		caracter = cadena[j];
		switch(caracter) {
			case 'a':
				contador = 0;
				break;

			default:
				contador = (contador + 1);
				if(contador>=4) {
					superContador++;
				}
				break;
		}
	}
	if(superContador>=1) {
		cout<<"Difficult"<<endl;
	} else {
		cout<<"Easy"<<endl;
	}

}*/