#! /usr/bin/env python
# -*- coding:utf-8 -*-

class No(object):
    def __init__(self, jogada, movimento=None, movimentos=[]):
        super(No, self).__init__()
        self.jogada = jogada
        self.movimentos = movimentos
        if movimento != None:
            self.movimentos.append(movimento)
