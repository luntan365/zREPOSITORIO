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

class ItemLista(Button):
    def __init__(self, indice=0,  **kwargs):
        super(ItemLista, self).__init__(**kwargs)
        self.indice = indice
        self.size_hint=(1, None)
        self.height=60
        self.font_size=20
            
    def on_release(self):
        print lista_ativa[self.indice]
        print self.parent.remove_widget(self)
        pass

    pass
        
class ListaAtiva(FloatLayout):
    def __init__(self, **kwargs):
        super(ListaAtiva, self).__init__(**kwargs)
        
        lista = GridLayout(cols=1, spacing=5, padding=5, orientation='vertical', size_hint=(1, None))
        lista.bind(minimum_height=lista.setter('height'))
        
        for index, valor in enumerate(lista_ativa):            
            item_lista = ItemLista(index, text=valor)
            if index % 2 == 0:
                item_lista.background_color = (0.5, 0.5, 0.5, 1)
                pass                    
            lista.add_widget(item_lista)                        
            pass
        root = ScrollView(size_hint=(1, 1))
        root.add_widget(lista)
        self.add_widget(root)
        
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
