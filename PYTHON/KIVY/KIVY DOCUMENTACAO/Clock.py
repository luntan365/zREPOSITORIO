#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.label import Label
from kivy.clock import Clock

class myApp(App):

    def build(self):
        # invoca a funcao a cada 10 segundos
        Clock.schedule_interval(self.funcao1, 10)        
        # invoca funcao depois de de 10 segundos
        Clock.schedule_once(self.funcao2, 10)
        return Label(text='CLOCK')

    def funcao1(self, dt):
        print("funcao a cada 10 segundos")
        
    def funcao2(self, dt):
        print("funcao depois 10 segundos")
     

if __name__ == '__main__':        
    myApp().run()


#exemplo thead
# class Foo(object):
#     
#     def start(self):
#         Clock.schedule_interval(self.callback, 0.5)
#         
#     def callback(self, dt):
#         print('Execucanto a cada .5 segundos')
# 
# foo = Foo()
# foo.start()
