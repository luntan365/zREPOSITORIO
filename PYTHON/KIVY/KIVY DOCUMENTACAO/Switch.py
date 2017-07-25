#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.switch import Switch

class Tela(FloatLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.switch = Switch(active=False)
        self.switch.bind(active=self.esta_ativo)        
        self.add_widget(self.switch)   

    def esta_ativo(self, instance, value):
        if value == True:
            print('O switch Ativo')
        else:
            print('O switch Desativado')
         
                
class myApp(App):        
    def build(self):                
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
