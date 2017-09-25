#! /usr/bin/env python
# -*- coding:utf-8 -*-

class No(object):
    def __init__(self, jogada, movimento=None, movimentos=[]):
        super(No, self).__init__()
        self.jogada = jogada
        self.qnt_pecas_fora_lugar = self.qnt_pecas_fora_lugar(jogada);
        self.movimentos = movimentos
        if movimento != None:
            self.movimentos.append(movimento)


    def qnt_pecas_fora_lugar(self, jogo8):
        qnt = 0;
        if (jogo8[0] != 1):
            qnt = qnt + 1
        if (jogo8[1] != 2):
            qnt = qnt + 1
        if (jogo8[2] != 3):
            qnt = qnt + 1
        if (jogo8[3] != 4):
            qnt = qnt + 1
        if (jogo8[4] != 5):
            qnt = qnt + 1
        if (jogo8[5] != 6):
            qnt = qnt + 1
        if (jogo8[6] != 7):
            qnt = qnt + 1
        if (jogo8[7] != 8):
            qnt = qnt + 1
        if (jogo8[8] != 9):
            qnt = qnt + 1
        return qnt
