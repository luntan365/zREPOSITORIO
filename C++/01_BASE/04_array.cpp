#include <iostream>
#include <stdlib.h>
using namespace std; 
int main() {

  int array_int[10]; //array inteiro com tamanho 10
  array_int[0] = 99;

    int array_zero[10] = {}; // todas posicoes iniciam com valor 00

  int array_ini[] = {1,5,6,5,9,8,7,1,3,10};
  tamanho_array = sizeof(array_ini) / sizeof(array_ini[0])
  for (int i = 0; i < tamanho_array; i++) {
    cout << i << endl;
  }

  int matriz[10][10]; //array bidimensional 10x10
  for (int i = 0; i < 10; i++) {
    for (int j = 0; j < 10; j++) {
      matriz[i][j] = rand();
      cout << matriz[i][j] << ", ";
    }
    cout << endl;
  }

  
  
  
  system("pause");
  return 0;  
}
