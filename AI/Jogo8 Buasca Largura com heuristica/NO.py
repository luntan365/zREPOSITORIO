#! /usr/bin/env python
# -*- coding:utf-8 -*-

class No(object):
    def __init__(self, jogada, movimento=None, movimentos=[], custo=0):
        super(No, self).__init__()
        self.jogada = jogada
        self.custo = custo
        self.movimentos = movimentos
        if movimento != None:
            self.movimentos.append(movimento)
