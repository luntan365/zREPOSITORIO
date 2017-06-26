#include <stdio.h>
#include <stdlib.h>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char *argv[]) {
	int array [10];
	int i,j;
	for(i=0;i<10;i++){
		printf("\n Insira o valor na do array [%d] \n",i);
		scanf("%d",&j);
		array[i] = j;
	}
	for(i=0;i<10;i++)
	printf ("\t %d", array[i]);
	
	return 0;
}
