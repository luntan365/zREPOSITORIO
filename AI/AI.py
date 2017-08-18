#! /usr/bin/env python
# -*- coding:utf-8 -*-
import random
import time
import timeit
# ===================================================================

class No(object):
    def __init__(self, jogada, movimento=None, movimentos=[]):
        super(No, self).__init__()
        self.jogada = jogada
        self.movimentos = movimentos
        if movimento != None:
            self.movimentos.append(movimento)

# ===================================================================

class AI(object):
    def __init__(self):
        super(AI, self).__init__()
        self.achou = False
        self.todas_jogadas = []
        self.antigos_Filhos = []
        self.novos_Filhos = []

        jogada_inicial = [1,6,2,4,9,3,7,5,8]
        jogada_inicial = self.inserir_numeros_aleatrios()
        raiz = No(jogada_inicial)
        self.exibir(jogada_inicial)
        self.array_for_number(jogada_inicial)
        self.antigos_Filhos.append(raiz)
        inicio = time.time()
        while not self.achou:
            self.busca()        
        fim = time.time()
        print("Segundo: "+str(fim - inicio))
        print("Minutos: "+str((fim - inicio)/60))
        print("Horas: "+str(((fim - inicio)/60)/60))


    def criar_Filhos(self, no):
        for index_mover in self.movimentos_possiveis(no.jogada):
            jogada, movimento = self.mover(no.jogada, index_mover)
            jogada_num = self.array_for_number(jogada)
            # print((jogada_num not in self.todas_jogadas))
            # print(self.todas_jogadas)
            if jogada_num not in self.todas_jogadas:
                # print(no.movimentos)
                # self.exibir(jogada)
                self.todas_jogadas.append(jogada_num)
                movimentos_pai = no.movimentos[:]
                novo_no = No(jogada, movimento, movimentos_pai)

                if self.conseguiu(novo_no.jogada):
                    print("=============================Achou===========================")
                    print("=============================Achou===========================")
                    print("=============================Achou===========================")
                    self.exibir(novo_no.jogada)
                    print(novo_no.movimentos)
                    self.achou = True
                    return
                self.novos_Filhos.append(novo_no)


    def busca(self):
        for filho in self.antigos_Filhos:
            if self.achou:
                return
            self.criar_Filhos(filho)
            self.antigos_Filhos = self.novos_Filhos
        self.novos_Filhos = []
        pass


    def movimentos_possiveis(self, jogo8):
        index_vazio = jogo8.index(9)
        indices_jogadas = [[1,3], [0,2,4], [1,5], [0,4,6], [1,3,5,7], [2,4,8], [3,7], [4,6,8], [5,7]]
        return indices_jogadas[index_vazio]

    def mover(self, jogo8, index_mover):
        jogada_temp = jogo8[:]
        index_vazio = jogada_temp.index(9)
        jogada_temp[index_vazio] = jogada_temp[index_mover]
        jogada_temp[index_mover] = 9
        return jogada_temp, jogo8[index_mover]


    def conseguiu(self, jogo8):
        if (jogo8[0] == 1 and jogo8[1] == 2 and jogo8[2] == 3 and jogo8[3] == 4 and jogo8[4] == 5 and jogo8[5] == 6 and jogo8[6] == 7 and jogo8[7] == 8 and jogo8[8] == 9):
            return True
        else:
            return False

    def array_for_number(self, jogo8):
        num = ''.join(str(e) for e in jogo8)
        return int(num)

    def exibir(self, a):
        print("\n | "+str(a[0] if a[0]!=9 else ' ')+" | "+str(a[1] if a[1]!=9 else ' ')+" | "+str(a[2] if a[2]!=9 else ' ')+" | \n | "+str(a[3] if a[3]!=9 else ' ')+" | "+str(a[4] if a[4]!=9 else ' ')+" | "+str(a[5] if a[5]!=9 else ' ')+" | \n | "+str(a[6] if a[6]!=9 else ' ')+" | "+str(a[7] if a[7]!=9 else ' ')+" | "+str(a[8] if a[8]!=9 else ' ')+" | \n")
        pass

    def inserir_numeros_aleatrios(self):
        numeros_base = [1,2,3,4,5,6,7,8,9]
        numeros = []
        while len(numeros_base) > 0:
            indice_aleatorio = random.randrange(len(numeros_base))
            numeros.append(numeros_base.pop(indice_aleatorio))
        return numeros

# ===================================================================

ai = AI()
input()
