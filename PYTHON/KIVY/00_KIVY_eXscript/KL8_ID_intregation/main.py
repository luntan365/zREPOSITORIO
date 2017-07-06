# coding=utf-8
import kivy
from kivy.uix.boxlayout import BoxLayout

kivy.require('1.9.1')
from kivy.app import App


class JanelaApp(App):
    pass

class Tela(BoxLayout):
    def click(self):
        print('oi')
        self.ids.lb1.text = "cliquei botao LB1"
        self.ids.lb2.text = "cliquei botao LB2"

janela = JanelaApp()
janela.run()
