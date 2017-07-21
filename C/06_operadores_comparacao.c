#include <stdio.h> 
#include <stdlib.h> 
#include <locale.h>
int main() {
  char *locale;
    locale = setlocale(LC_ALL, "");

  printf("%i\n", 10==10);
  printf("%i\n", 10!=10);
  printf("%i\n", 10>10);
  printf("%i\n", 10<10);
  printf("%i\n", 10>=10);
  printf("%i\n", 10<=10);
  printf("%i\n", !(10==10) ); 

  printf("%i\n", 10==10 && 10==10);
  printf("%i\n", 10==10 || 10==10);


  if (10 == 10) {
    printf("10 == 10 \n");
  } else {
    printf("10 != 10 \n");
  }

  int w = 0;
  while (w < 10) {
    printf("%i\n", w);
    w += 1;
  }

  do {
    printf("Do While, Executa a primeira vez mesmo q condicao seja invalida\n");
  } while(0);

  for (int i = 0; i < 10; i++) {
    printf("%i\n", i);
  }
  
  int chave = 1;
  switch (chave) {
    case 0:
      printf("É 0\n");
      break;
    case 1:
      printf("É 1\n");
      break;
    default:
      printf("noa foi encontrada\n");
  }
  
  
  return 0;
}
