#include <stdio.h> 
#include <stdlib.h> 
#include <ctype.h>

int main() {

  char c = 'c';
  char c_maiusculo = toupper(c); // converte pra maiusculo

  printf("%c\n", c_maiusculo);
  
  return 0;
}
