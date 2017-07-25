#include <iostream>
#include <stdlib.h>
using namespace std; 

struct Pessoa {
  string nome;
  string sobrenome;
  int idade;
};

int main() {

  Pessoa p;
  p.nome = "Dejota";
  p.sobrenome = "Freitas";
  p.idade = 28;
  
  cout << "Nome: " + p.nome + ", Sobrenome: " + p.sobrenome + ", idade: " << p.idade << endl;
  
  system("pause");
  return 0; 
}
