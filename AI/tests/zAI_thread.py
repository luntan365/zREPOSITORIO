#! /usr/bin/env python
# -*- coding:utf-8 -*-
import random
import time
import timeit
from thread import start_new_thread
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
    todas_jogadas = []
    achou = [False]
    tempo_inicial = []
    mostrar_tempo = [True]

    def __init__(self, antigos_filhos=[], raiz=None):
        super(AI, self).__init__()
        # print("=== AI INSTANCIADA ===")
        self.antigos_filhos = antigos_filhos
        self.novos_filhos = []
        if raiz != None:
            self.exibir(raiz.jogada)
            self.array_for_number(raiz.jogada)
            self.antigos_filhos.append(raiz)
            pass
        start_new_thread(self.iniciar,())

    def __del__ (self):
        # print("=== AI DESTRUIDO ===")
        pass

    def iniciar(self):
        if len(self.tempo_inicial) < 1:
            self.tempo_inicial.append(time.time())
            pass

        while not self.achou[0]:
            tamanho = len(self.antigos_filhos)
            if tamanho <= 0:
                break
            if tamanho > 100:
                filhos_extraidos = []
                for i in range(tamanho//2):
                    filhos_extraidos.append(self.antigos_filhos.pop())
                newai = AI(antigos_filhos=filhos_extraidos)
            self.busca()
            pass

        if self.mostrar_tempo[0] and self.achou[0]:
            self.mostrar_tempo[0] = False
            inicio = self.tempo_inicial[0]
            fim = time.time()
            segundos = fim - inicio
            self.formatar_tempo(segundos)
            pass

        self.__del__()
        pass

    def busca(self):
        for filho in self.antigos_filhos:
            if self.achou[0]:
                return
            self.criar_Filhos(filho)
            self.antigos_filhos = self.novos_filhos
        self.novos_filhos = []
        pass

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
                    self.exibir(novo_no.jogada)
                    print(novo_no.movimentos)
                    self.achou[0] = True
                    return
                self.novos_filhos.append(novo_no)

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

    def formatar_tempo(self, segundos):
        horas = int(segundos // 360)
        minutos = int((segundos % 360) // 60)
        segundos = int((segundos % 360) % 60)
        print("Tempo Gasto : "+str(horas)+":"+str(minutos)+":"+str(segundos))


# ===================================================================
def inserir_numeros_aleatrios():
    numeros_base = [1,2,3,4,5,6,7,8,9]
    numeros = []
    while len(numeros_base) > 0:
        indice_aleatorio = random.randrange(len(numeros_base))
        numeros.append(numeros_base.pop(indice_aleatorio))
    return numeros
# ===================================================================
jogada_inicial = [1,6,2,7,4,9,5,8,3]
# jogada_inicial = [9,8,7,6,5,4,3,2,1]
jogada_inicial = inserir_numeros_aleatrios()
raiz = No(jogada_inicial)
ai = AI(raiz=raiz)

while True:
    pass
