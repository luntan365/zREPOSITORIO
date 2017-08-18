#! /usr/bin/env python
# -*- coding:utf-8 -*-
import time
from thread import start_new_thread

def todas_jogadas_possiveis():
    todas_jogadas = []
    for num in range(1,10):
        for pos in range(1,10):
            if num == pos:
                continue
            jogada = []
            for val in range(1,10):
                if val == pos:
                    jogada.append(num)
                if(val != num):
                    jogada.append(val)
            todas_jogadas.append(jogada)
        todas_jogadas.append([2,3,4,5,6,7,8,9,num])
    todas_jogadas.pop(10)
    todas_jogadas.pop(19)
    todas_jogadas.pop(28)
    todas_jogadas.pop(37)
    todas_jogadas.pop(46)
    todas_jogadas.pop(55)
    todas_jogadas.pop(64)
    todas_jogadas.pop(73)
    return todas_jogadas

def movimentos_possiveis(jogo8):
    index_vazio = jogo8.index(9)
    indices_jogadas = [[1,3], [0,2,4], [1,5], [0,4,6], [1,3,5,7], [2,4,8], [3,7], [4,6,8], [5,7]]
    return indices_jogadas[index_vazio]

def mover(jogo8, index_mover):
    jogada_temp = jogo8[:]
    index_vazio = jogada_temp.index(9)
    jogada_temp[index_vazio] = jogada_temp[index_mover]
    jogada_temp[index_mover] = 9
    return jogada_temp, jogo8[index_mover]


def conseguiu(jogo8):
    if (jogo8[0] == 1 and jogo8[1] == 2 and jogo8[2] == 3 and jogo8[3] == 4 and jogo8[4] == 5 and jogo8[5] == 6 and jogo8[6] == 7 and jogo8[7] == 8 and jogo8[8] == 9):
        return True
    else:
        return False

def exibir(a):
    print("\n | "+str(a[0] if a[0]!=9 else ' ')+" | "+str(a[1] if a[1]!=9 else ' ')+" | "+str(a[2] if a[2]!=9 else ' ')+" | \n | "+str(a[3] if a[3]!=9 else ' ')+" | "+str(a[4] if a[4]!=9 else ' ')+" | "+str(a[5] if a[5]!=9 else ' ')+" | \n | "+str(a[6] if a[6]!=9 else ' ')+" | "+str(a[7] if a[7]!=9 else ' ')+" | "+str(a[8] if a[8]!=9 else ' ')+" | \n")
    pass

# ===================================================================
class No():
    def __init__(self, jogada, movimento=None, movimentos=[]):
        self.jogada = jogada
        self.movimentos = movimentos
        self.movimento = movimento
        if self.movimento != None:
            self.movimentos.append(self.movimento)



# ===================================================================
achou = False
todas_jogadas = []
jogada_inicial = [1,2,3,4,5,6,7,9,8]
exibir(jogada_inicial)
raiz = No(jogada_inicial)

antigos_Filhos = []
novos_Filhos = []

def criar_Filhos(no):
    if achou:
        return

    for index_mover in movimentos_possiveis(no.jogada):
        jogada, movimento = mover(no.jogada, index_mover)
        if not (jogada in todas_jogadas):
            print(no.movimentos)
            exibir(jogada)
            todas_jogadas.append(jogada)
            novo_no = No(jogada, movimento=movimento, movimentos=no.movimentos)
            novos_Filhos.append(novo_no)

            if conseguiu(novo_no.jogada):
                print("=============================Achou===========================")
                print("=============================Achou===========================")
                print("=============================Achou===========================")
                print("=============================Achou===========================")
                print(no.movimentos)
                return


def busca():
    for filho in antigos_Filhos:
        criar_Filhos(filho)
        pass
    antigos_Filhos = novos_Filhos
    novos_Filhos = []
    busca()
    pass


criar_Filhos(raiz)
antigos_Filhos = novos_Filhos
novos_Filhos = []
busca()

# ===================================================================
input()
