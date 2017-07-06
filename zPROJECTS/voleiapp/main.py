# coding: utf-8
import kivy
kivy.require('1.10.0')
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.floatlayout import FloatLayout
from kivy.lang import Builder
from threading import Thread
import os
from datetime import date
import time

Window.size = 350, 550

Builder.load_string("""
<Tela>:
    Button:
        text: 'Lista'
        size_hint: 1, .8
        pos_hint: {"x":0, "y":.2}
    TextInput:
        id: caixa_texto
        font_size: 33
        font_name: "consola"
        write_tab: False
        multiline: False
        size_hint: .6, .1
        pos_hint: {"x":.2, "y":0}
        padding: 10
    Button:
        text: '+'
        font_size: 50
        size_hint: .2, .1
        pos_hint: {"x":0, "y":0}
        on_release: root.add_pessoa()
    Button:
        text: 'X'
        font_size: 33
        size_hint: .2, .1
        pos_hint: {"x":.8, "y":0}
        on_release: root.cacnelar_pesquisa()
    Button:
        text: 'Pendentes'
        font_size: 20
        size_hint: .4, .1
        pos_hint: {"x":0, "y":.1}
        on_release: root.listar_pendentes()
    Button:
        text: 'Pagantes'
        font_size: 20
        size_hint: .4, .1
        pos_hint: {"x":.4, "y":.1}
        on_release: root.listar_pagantes()
    Button:
        text: '---'
        font_size: 50
        size_hint: .2, .1
        pos_hint: {"x":.8, "y":.1}
        on_release: root.relatorio()
""")

class Tela(FloatLayout):

    def add_pessoa(self):
        self.ids.caixa_texto.text

    def cacnelar_pesquisa(self):
        self.ids.caixa_texto.text

    def listar_pendentes(self):
        self.ids.caixa_texto.text

    def listar_pagantes(self):
        self.ids.caixa_texto.text
                
    def relatorio(self):
        self.ids.caixa_texto.text



class VoleiApp(App):
    def build(self):
        return Tela()
    pass


if __name__ == '__main__':
    VoleiApp().run()
    pass
