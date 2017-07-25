#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.button import Button
from kivy.uix.stacklayout import StackLayout

class Tela(StackLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        # Orientações: ‘lr-tb’, ‘tb-lr’, ‘rl-tb’, ‘tb-rl’, ‘lr-bt’, ‘bt-lr’, ‘rl-bt’ and ‘bt-rl’
        self.orientation = 'lr-tb'
        for i in range(50):
            btn = Button(text=str(i), width=40 + i * 5, size_hint=(None, 0.15))
            self.add_widget(btn)
 
                
class myApp(App):        
    def build(self):                
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
