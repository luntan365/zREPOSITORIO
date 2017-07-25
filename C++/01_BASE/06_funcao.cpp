#include <iostream>
#include <stdlib.h>
using namespace std; 

// FUNCAO
bool is_par (int num){
  if (num % 2 == 0) {
    return true;
  }
  return false;
}

int main() {

  int num = 0;  
  cout << "Insira um numero." << endl;
  cin >> num;  
  if (is_par(num)) {
    cout << "PAR" << endl;
  } else {
    cout << "IMPAR" << endl;
  }  
  
  system("pause");
  return 0; 
}
