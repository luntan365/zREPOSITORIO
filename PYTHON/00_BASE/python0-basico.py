# ========== COMENTÁRIO ==========
print("Hello World!!!")
# USAR NOMES DE PACKAGE CURTOS E MINUSCULO: os, package e etc
# nome_varivel = "variavel"
# NOME_CONSTANTE = "PI"
# nome_metodo(nome_parametros)
# class NomeCLasse

print("========== ENTRADA DE DADOS ==========")
# nome = input("Insira seu nome \n")
# numero = int(input("insira seu salrario \n"))
# numero_decimal = float(input("insira seu salrario \n"))
# bollean = bool(input("insira seu 0 ou 1 True ou False \n"))

print("========== VARIAVEL ==========")
i = d = s = b = "atribuindo valor a todos de uma vez"
i = 1
d = 10.5
s = "texto"
b = (i == d == s) #comparando todos e atribuido o resultado boolean a varivel d

from types import *
print(type(i))
print(type(d))
print(type(s))
print(type(b))


print("========== ATRIBUICAO CONDICIONAL ==========")
x = 10 if 1==0 else 0
print(x)

print("========== ATRIBUICAO MULTIPLA ==========")
a = 10
b = 20
c = 30

a, b = b, a
print(a, ", ", b) #troca valores de variveis facilmente sem precisar de auxiliar
a, b, c = a*b/c, a+b+c, -a-b-c
print(a, ", ", b, ", ", c)


print("========== CONCATENACAO ==========")
nome = "Dejota"
print("seu nome é", nome)
print("seu nome é " + nome)
print("seu nome é %s" %nome)

idade = 26
print("sua idade é", idade)
print("sua idade é " + str(idade))
print("sua idade é %i %i" %(idade, idade))
print("sua idade é %.10i" %idade)

altura = 1.74
print("sua altura é", altura)
print("sua altura é " + str(altura))
print("sua altura é %f" %altura)
print("sua altura é %.10f" %altura)

print("========== CONVERÇÃO DE DADOS ==========")
print(type(str(10)),        str(10))#converte inteiro
print(type(int("10")),      int("10"))#converte float
print(type(float("10")),    float("10"))#converte string
print(type(bool(1)),        bool(1))#converte boolean

print("========== MATEMATICA ==========")
print(10+10)
print(10-10)
print(10*10)
print(10**2) # exponeciação = 10 ao quadrado
print(10**3) # exponeciação = 10 ao cubo
print(100**(1/2)) # raiz quadrada
print(100**(1/3)) # raiz cubica
print(10/6)
print(10//6) # divide e remove casas decimais sem arredondamento
print(10%4) #resto da divisão

import math
dir(math)
print(math.pi)





print("========== OPERADORES CONDICIONAIS ==========")
print(0==0)
print(0!=0)
print(0>0)
print(0<0)
print(0>=0)
print(0<=0)
print('a'>'b') #relação a tabela ASCI

print(0==0==0==0==0==0)


print("========== OPERADORES LOGICOS ==========")
# and = e
# or = ou
# not = negação
# is = é
# is not = não é
# in = contem
# not in = não contem
print(0==0 and 0!=0)
print(0==0 or 0!=0)
print(0==0 and not (0!=0))
print(type(2) is int)
print(type(2.0) is not float)
print(2 in [5,6,2]) # está contido no array
print(2 not in [5,6,2]) # não está contido no array

#Se a primemira situação for falsa ele nao vai verificar o resto
print( ((5 and 10) or (2 and 6)) in [5,6,2] )



print("========== TOMADA DE DECISAO ==========")
if True:
    print("IF")
elif True:
    print("ELIF")
else:
    print("ELSE")


print("========== LAÇOS DE REPETICAO ==========")
#WHILE
x = 0
while(x<10):
    x+=1
    if x == 3:
        continue
    if x>=5:
        break
    print("while ", x)
else:
    print("FIM do WHILE")

#FOR
for p in range(len("0123")):
    print("FOR ", p)

for p in range(10, 5, -1):
    print("FOR REVERSE", p)

for i in range(0, 10, 2):
    print("FOR INTERVALO", i)

s = "FOR"
for key, value in enumerate(s):
    print(str(key)+" "+value)


print("========== ID DO OBJETO ==========")
a = "abc"
b = "abc"
c = "ABC"
print(id(a))
print(id(b))
print(id(c))


print("==========  ==========")
# from time import sleep
# sleep(10)
input()
