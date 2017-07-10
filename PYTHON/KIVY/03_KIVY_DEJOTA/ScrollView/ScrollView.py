# coding: utf-8
import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.scrollview import ScrollView
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label
from kivy.core.window import Window
from kivy.graphics import Color, Rectangle
from kivy.clock import Clock

Window.size = 350, 550
lista_pendentes = ['Dejota Freitas', 'Amanda Raquel', 'Diego Alef', 'Diego', 'Rodrigo','Monique Amarela', 'jannarynna de Rodrigo','Amigo de Diego', 'Magrinha Alta']
lista_pagantes = ['monique', 'jannarynna']
lista_ativa = lista_pendentes

class BotaoItemLista(Button):
    def __init__(self, indice, **kwargs):
        super(BotaoItemLista, self).__init__(**kwargs)
        self.indice = indice
        self.font_size = 20        
    def on_press(self):
        del(lista_ativa[self.indice])
        volei.build()
    pass
    
class ListaAtiva(FloatLayout):
    def __init__(self, **kwargs):
        super(ListaAtiva, self).__init__(**kwargs)
        
        lista = GridLayout(cols=2, spacing=5, padding=5, orientation='vertical', size_hint=(1, None))
        lista.bind(minimum_height=lista.setter('height'))
        
        for index, valor in enumerate(lista_ativa):            
            nome = Label(text=valor, size_hint=(3, None), font_size='20sp', height=50)
            if index % 2 == 0: 
                with nome.canvas.before:
                    Color(0.5, 0.5, 0.5)
                    nome.rect = Rectangle(pos=nome.pos, size=nome.size)
                def update_rect(instance, value):
                    instance.rect.pos = instance.pos
                    instance.rect.size = instance.size                    
                nome.bind(pos=update_rect, size=update_rect)               
                pass                    
            pagou = BotaoItemLista(index, text='Pagou', size_hint=(1, None), height=50, background_color=(.1,1,.1,1))
            lista.add_widget(nome)
            lista.add_widget(pagou)            
            pass
        root = ScrollView(size_hint=(1, 1))
        root.add_widget(lista)
        self.add_widget(root)
    pass
        
class Tela(FloatLayout):
        
    def add_pessoa(self):
        self.ids.caixa_texto.text

    def cancelar_pesquisa(self):
        self.ids.caixa_texto.text

    def listar_pendentes(self):
        self.ids.caixa_texto.text

    def listar_pagantes(self):
        self.ids.caixa_texto.text
                
    def relatorio(self):
        self.ids.caixa_texto.text
    pass

  
class VoleiApp(App):    
    def build(self):
        self.title = "Volei"
        return Tela()
    pass
volei = VoleiApp()
if __name__ == '__main__':
    volei.run()
    pass
