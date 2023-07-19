#include <iostream>
#include <string>
#include <stdlib.h>
#include <math.h>
using namespace std;

int t;
string s;
int main()
{
	cin>>t;
	for (int i=1; i<(t+1); i++){
		string cadena;
		char caracter;
		cin>>cadena;
		
		int longitud = cadena.length();
		int contador=0;
		int superContador=0;
		for (int j=0; j<longitud; j++){
			caracter = cadena[j];
			switch(caracter){
				case 'a':
					contador = 0;
					break;
				case 'e':
					contador = 0;
					break;
				case 'i':
					contador = 0;
					break;
				case 'o':
					contador = 0;
					break;
				case 'u':
					contador = 0;
					break;
				case 'y':
					contador = 0;
					break;
				default:
					contador = (contador + 1);
					if(contador>=4){
						superContador++;
					}
					break;
			}			
		}
		if(superContador>=1){
			cout<<"Difficult"<<endl;
		}
		else{
			cout<<"Easy"<<endl;
		}
		
	}
}