#include <stdio.h> 
#include <stdlib.h> //biblioteca de matematica

int main() {

  int num1 = 20;
  int num2 = 10;
  
  int soma = num1 + num2;      
  printf("%i + %d = %d \n", num1, num2, soma);

  int subtracao = num1 - num2;      
  printf("%i - %d = %d \n", num1, num2, subtracao);  

  int multiplicacao = num1 * num2;      
  printf("%i * %d = %d \n", num1, num2, multiplicacao); 

  int divisao = num1 / num2;      
  printf("%i / %d = %d \n", num1, num2, divisao); 

  int resto = num1 % num2;      
  printf("%i %% %d = %d \n", num1, num2, resto);
    
  return 0;
}
