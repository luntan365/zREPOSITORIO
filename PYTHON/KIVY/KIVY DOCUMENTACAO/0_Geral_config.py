#!/usr/bin/env python
# -*- coding: utf-8 -*-
import kivy
kivy.require('1.9.1')
kivy.compat.PY2 = True #usa o python 2

from kivy.app import App
from kivy.uix.label import Label
from kivy.uix.boxlayout import BoxLayout

class myApp(App):
    nome = 'dejota Stormrage'
    def build(self):
        self.title = 'Dejota App' #TITULO DA APLICACO        
        self.icon = '0icon.png'  #RESOLUCAO 256X256
        return Label(text='Geral')

    def on_start(self):
        
        print(self.directory) #diretorio atual da aplicacao   
        print(self.user_data_dir) #retorna diretorio do sistema de arquivos do sistema
             
        print(self.get_running_app().nome) #INSTACIA ATAUAL DA APLICACAO
        print(self.root) #retorna o WIDGET retornado pelo metodo build, nesse casoa Label
        print(self.root_window) #retorna instacia da janela raiz da aplicacao

        #Carregardor de imagem assincrona, aceita URL da net
        from kivy.loader import Loader
        image = Loader.image('0icon.png') 
        

if __name__ == '__main__':        
    myApp().run()
