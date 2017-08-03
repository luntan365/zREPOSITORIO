#include <iostream>
#include <stdlib.h>
using namespace std; 

int func_pont(int* var) {
  *var = 123;
}

int main() {
  
  int i = 10;
  int* ponteiro = &i; // recebendo referencia de memoria da variavel i
  *ponteiro = 5; // referenciando poneteiro

  func_pont(ponteiro); // recebe ponteiro por parametro
  func_pont(&i); // recebe referencia de memoria por parametro

  std::cout << *ponteiro << '\n';
  std::cout << i << '\n';

  int* pont_vector = new int[3];
  *(pont_vector+0) = 100; //referenciando ponteiro de votor
  *(pont_vector+1) = 200;
  *(pont_vector+2) = 300;

  std::cout << *(pont_vector) << '\n'; //esta apontando para posicao 0 do array
  std::cout << *(pont_vector+1) << '\n'; //esta apontando para posicao 1 do array
  std::cout << *(pont_vector+2) << '\n'; //esta apontando para posicao 2 do array

  for (int i = 0; i < 3; i++) {
    std::cout << *(pont_vector+i) << '\n';
  }

  // desalocando poteiros da memoria
  delete ponteiro; 
  ponteiro = NULL;
  delete[] pont_vector;
  pont_vector = NULL;
  
  system("pause");
  return 0;  
}
