
lista = [x for x in range(10)]
print(lista)

lista = [x for x in range(10) if x%2==0]
print(lista)

lista = [x+y for x in "DEJOTA" for y in "dejota"]
print(lista)

import random
lista = [random.randint(1,10) for i in range(10)]
print(lista)

# lista = [linha.rstrip() for linha in open(arquivo.txt)]


print(all([1,1,1,1])) #todo selmentos tem ser verdadeiro
print(any([0,0,0,1])) #pelo menis 1 elmentos tem ser verdadeiro
print(sum([10,20,30,1])) #soma todos elemntos de uma lista




# Objetos geradores

def gerador(x):
    for i in range(x):
        yield i**2

for value in gerador(5):
    print(value)




input()
