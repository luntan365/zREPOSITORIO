#include <stdio.h> 
#include <stdlib.h> 

int main() {

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

  for (int i = 0; 1 ; i++) {
    if (i == 5) { continue; }
    if (i == 10) { break; } 
    printf("%i\n", i);
  }

  for (int i = 0, j = 10; i <= 5 && j >= 5; i++, j--) {
    printf("i=%i e j=%i\n", i, j);
  }
  
  int chave = 1;
  switch (chave) {
    case 0:
      printf("eh 0\n");
      break;
    case 1:
      printf("eh 1\n");
      break;
    default:
      printf("noa foi encontrada\n");
  }
  
  
  return 0;
}
