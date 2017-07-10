# coding=utf-8
import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.boxlayout import BoxLayout

Window.size = 300, 200

class JanelaApp(App):
    pass

class Tela(BoxLayout):

    def clicou(self):
        self.ids.lb.text = self.ids.ip.text

    def soltou(self):
        self.ids.ip.text = ""

janela = JanelaApp()
janela.run()
