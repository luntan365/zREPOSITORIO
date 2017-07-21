#include <stdio.h> 
#include <stdlib.h>

int main() {

  int num = 0;
  printf("digite um numero\n");
  scanf("%i", &num);
  printf("numero digitado foi %d\n", num);

  // lendo 2 numeros de uma vez
  int num1, num2 = 0;
  printf("digite dois numero\n");
  scanf("%i%i", &num1, &num2);
  printf("numero digitado foram %d, %i\n", num1, num2);

  // %% = imprimir sinal de %
  // %i ou %d = numero int
  // %f = numero float ou double
  // %c = char
  // %s = string
  // %u = modulo do numero
  // %p = endereço de memoria
  // %e ou %E = numeros com notacao cientifica

  // \n = quebra de linha
  // \t = tabulação
  // \\ = impime uma barra invertida 
  // \" = impimir aspas  
  // \' = impimir aspas
  // \0 = indica o final do texto, implicitos nas strings
  
  
  return 0;
}
