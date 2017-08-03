#include <iostream>
#include <stdlib.h>

using namespace std; 

int main() {
  
  // void eh vazio
  bool b = true;
  int i = 10;
  float f = 5.33;
  double d = 10.55;
  char c = 'c';
  // wchar_t wc = 'wchar_t';
  
  static int vs = 0; // varivel estatica

  char nome[] = "Dejota Freitas";
  int index = 0;
  while (nome[index])
    std::cout << nome[index++];

  
  system("pause");
  return 0;  
}
