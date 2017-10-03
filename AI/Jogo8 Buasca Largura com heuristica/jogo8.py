#! /usr/bin/env python
# -*- coding:utf-8 -*-
import random

def inserir_numeros_aleatrios():
    numeros_base = [1,2,3,4,5,6,7,8,9]     
    numeros = []    
    while len(numeros_base) > 0:
        indice_aleatorio = random.randrange(len(numeros_base))
        numeros.append(numeros_base.pop(indice_aleatorio))
    return numeros
    
def exibir(a):
    print("\n | "+str(a[0] if a[0]!=9 else ' ')+" | "+str(a[1] if a[1]!=9 else ' ')+" | "+str(a[2] if a[2]!=9 else ' ')+" | \n | "+str(a[3] if a[3]!=9 else ' ')+" | "+str(a[4] if a[4]!=9 else ' ')+" | "+str(a[5] if a[5]!=9 else ' ')+" | \n | "+str(a[6] if a[6]!=9 else ' ')+" | "+str(a[7] if a[7]!=9 else ' ')+" | "+str(a[8] if a[8]!=9 else ' ')+" | \n")
    pass
    
def movimentos_possiveis(array_jogo8):
    index_vazio = array_jogo8.index(9)
    indices_jogadas = [[1,3], [0,2,4], [1,5], [0,4,6], [1,3,5,7], [2,4,8], [3,7], [4,6,8], [5,7]]
    return indices_jogadas[index_vazio]

def mover(jogo8):
    jogadas = [ jogo8[x] for x in movimentos_possiveis(jogo8) ]
    num_move = None
    while True:
        print "Mova:", jogadas
        try:
            num_move = input()
            if num_move in jogadas:
                  break
            else:
                pass
        except Exception as e:
            pass    
    index_vazio = jogo8.index(9)
    index_mover = jogo8.index(num_move)
    jogo8[index_vazio] = jogo8[index_mover]
    jogo8[index_mover] = 9
    

def conseguiu(jogo8):
    if jogo8[0] == 1 and jogo8[1] == 2 and jogo8[2] == 3 and jogo8[3] == 4 and jogo8[4] == 5 and jogo8[5] == 6 and jogo8[6] == 7 and jogo8[7] == 8 and jogo8[8] == 9:
        return True
    else:
        return False
       
    
# inico jogo
jogo = inserir_numeros_aleatrios()
while True:
    exibir(jogo)
    mover(jogo)
    if conseguiu(jogo):
        print("PARABES, VC CONSEGUIU")
        break

# fim jogo

input()
