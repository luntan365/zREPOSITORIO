#include <iostream>
#include <stdlib.h>
using namespace std; 

void texto() {
  cout << "FUNCAO SEM ARGUMENTO" << endl;
}
void texto(string texto) {
  cout << "FUNCAO COM ARGUMENTO: " << texto << endl;
}
void texto(int num) {
  cout << "FUNCAO COM ARGUMENTO: " << num << endl;
}

int main() {

  texto();
  texto("DEJOTA");
  texto(2);
  
  system("pause");
  return 0; 
}
