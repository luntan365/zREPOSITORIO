#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.label import Label
from kivy.cache import Cache

class myApp(App):

    def build(self):
        #salva ate 10 valores com tempo de vida 60 de segundos
        Cache.register('mycache', limit=10, timeout=60) 

        # id da cache
        key = 'objectid'
        # objeto a ser salvo
        objeto = Label(text='CACHE')

        # salvando no cache        
        Cache.append('mycache', key, objeto)
        
        # retorna valor do cache
        instance = Cache.get('mycache', key) 

        #remove do cahce
        Cache.remove('mycache', key)     
    
        return instance
        

if __name__ == '__main__':        
    myApp().run()
