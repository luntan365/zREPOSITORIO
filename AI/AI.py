#! /usr/bin/env python
# -*- coding:utf-8 -*-
import time
from NO import No

class AI(object):
    todas_jogadas = []
    achou = False

    def __init__(self, antigos_filhos=[], raiz=None):
        super(AI, self).__init__()
        self.antigos_filhos = antigos_filhos
        self.novos_filhos = []
        if raiz != None:
            self.exibir(raiz.jogada)
            self.array_for_number(raiz.jogada)
            self.antigos_filhos.append(raiz)
            pass
        self.iniciar()

    def iniciar(self):        
        inicio = time.time()        
        while not self.achou:
            self.busca()
        fim = time.time()
        segundos = fim - inicio
        print(self.formatar_tempo(segundos))

    def busca(self):
        for filho in self.antigos_filhos:
            if self.achou:
                return
            self.criar_Filhos(filho)
            self.antigos_filhos = self.novos_filhos
        self.novos_filhos = []
        pass

    def criar_Filhos(self, no):
        for index_mover in self.movimentos_possiveis(no.jogada):
            jogada, movimento = self.mover(no.jogada, index_mover)
            jogada_num = self.array_for_number(jogada)
            if jogada_num not in self.todas_jogadas:
                # print(no.movimentos)
                # self.exibir(jogada)
                self.todas_jogadas.append(jogada_num)
                movimentos_pai = no.movimentos[:]
                novo_no = No(jogada, movimento, movimentos_pai)

                if self.conseguiu(novo_no.jogada):
                    self.exibir(novo_no.jogada)
                    print(novo_no.movimentos)
                    self.achou = True
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
        horas = int(segundos // 3600)
        minutos = int((segundos % 3600) // 60)
        segundos = int((segundos % 3600) % 60)
        return "Tempo Gasto %.2i:%.2i:%.2i" %(horas, minutos, segundos)
