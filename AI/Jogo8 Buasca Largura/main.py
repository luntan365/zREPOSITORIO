#! /usr/bin/env python
# -*- coding:utf-8 -*-
import random
from NO import No
from AI import AI

# ===================================================================
def inserir_numeros_aleatrios():
    numeros_base = [1,2,3,4,5,6,7,8,9]
    numeros = []
    while len(numeros_base) > 0:
        indice_aleatorio = random.randrange(len(numeros_base))
        numeros.append(numeros_base.pop(indice_aleatorio))
    return numeros
# ===================================================================

# 9 é espaço vazio
# jogada_inicial = inserir_numeros_aleatrios()
jogada_inicial = [1,6,2,7,4,9,5,8,3]
raiz = No(jogada_inicial)
ai = AI(raiz=raiz)



# ===================================================================
try:
    input();
except Exception as e:
    print("EXIT1")
