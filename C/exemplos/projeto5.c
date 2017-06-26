#include <stdio.h>
#include <stdlib.h>

/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char *argv[]) {
	printf("Escolha o tamanho de sua lista de números\n");
	int tlista;
	scanf("%d",&tlista);
	int lista [tlista];
	
	int i,j,w,x,maior;
	
	for (i=0;i<tlista;i++){
	printf("Ensira o %d º valor da lista\n",(i+1));
	scanf("%d",&lista[i]);
	}
	
	for (i = 0;i<tlista;i++)
	printf("%d\t",lista[i]);
	
	printf("\n");
	
	maior = lista[0];
	
	for (w = 0 ; w<=tlista ; w++){
	for (i = 0, j = 1 ; j<tlista ; i++, j++){
		if(lista[i]>lista[j]){
			x=lista[i];
			lista[i]=lista[j];
			lista[j]=x;
		}
		
		
	}
}
		for (i = 0;i<tlista;i++)
		printf("%d\t",lista[i]);
		
		printf("\n");
		
		for (i = 0;i<tlista;i++){
			if(lista[i]!=lista[0] && lista[i]!=lista[tlista-1]){
			printf("%d eh um valor intermediario da lista\n",lista[i]);
			}else if(lista[i]==lista[0]){
			printf("%d eh o menor valor da lista\n",lista[i]);
			}else if(lista[i]==lista[tlista-1]){
			printf("%d eh o maior valor da lista\n",lista[i]);	
			}
			}


	return 0;
}
