#include <stdio.h>
#include <stdlib.h>

int main()
{
    int i, j;
    printf("Digite peimeira nota:\n");
    scanf("%d",&i);
    printf("Digite segunda nota:\n");
    scanf("%d",&j);
    int media = (i+j)/2;
    printf("Sua media e %i \n",media);
    if(media>=7){
    	printf("Aprovado");
	}else if (media<7&&media>=4){
		printf("faca prova final");
	}else{
		printf("reprovado");
	}
    return 0;
}
