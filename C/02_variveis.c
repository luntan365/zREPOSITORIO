#include <stdio.h>

#define constante_mais_rapida 99 // CONSTANTE fora de padrao , mas mais rapida

int main() {
  printf("%i \n", constante_mais_rapida);

  const int CONSTANTE = 99;
  printf("%i \n", CONSTANTE);
  
  //void vazio; // vazio, usado no retorno de funcoes q nao retornam nada 
  
  char c = 'c';
  printf("%c \n", c);

  int i; 
  //quando não é atribuido um valor a carial, o C atribui aleatoriamente a variavel
  printf("%d \n", i); 
  
  float f = 10;
  printf("%f \n", f);

  double numeroFlutuante = 3;
  printf("%f \n", numeroFlutuante);

  // MODIFICADORES DE TIPO
  // signed = numeros positivos e negativos
  // unsigned = somente numeros positivos e a capacidade posisitiva dobra
  // long = aumenta a capacidade da variavel
  //  short = diminui a capacidade da variavel

  unsigned short int usi; 
  printf("%i \n", usi); 

  unsigned long int uli; 
  printf("%i \n", uli); 
  
  return 0;
}
