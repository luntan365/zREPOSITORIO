#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.label import Label
import sys
reload(sys)
sys.setdefaultencoding("utf-8")

class CicloDeVidaApp(App):
    
    def on_start(self):
        print("APP INICIADO - CARREGAR DADOS NECESSÁRIO")
        pass

    def on_stop(self):
        print("APP FECHADO - SALVAR DADOS")
        pass
        
    def on_pause(self):
        print("APP PAUSADO - SALVAR DADOS, SE RETURN TRUE, APP CHAMA ON_RESUME AO DESPAUSAR, O ANDROID PODE MATAR EXECUCAO QUANDO PRECISAR DE MEMORIA E ON_RESUME NAO SERA INVOCADO")
        return True

    def on_resume(self):
        print("APP DESPAUSADO - CARREGAR DADOS NECESSARIO")
        pass

# ==========================================================================
    def build(self):
        return Label(text='Ciclo do vida')    
CicloDeVidaApp().run()
