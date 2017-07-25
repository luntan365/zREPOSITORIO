#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.base import runTouchApp
from kivy.uix.spinner import Spinner

class Tela(FloatLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.spinner = Spinner(text='Menu', values=('Home', 'Trabalho', 'Lazer', 'configurar'), size_hint=(None, None), size=(100, 44), pos_hint={'x': .5, 'top': 1})
        self.spinner.bind(text=self.valor_selecionado_spinner)
        self.add_widget(self.spinner)       

    def valor_selecionado_spinner(self, spinner, text):
        print('O spinner', spinner, 'tem o texto', text)
         
                
class myApp(App):        
    def build(self):                
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
