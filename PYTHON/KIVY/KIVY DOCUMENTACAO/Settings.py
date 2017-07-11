#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.settings import Settings
from kivy.uix.label import Label
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.gridlayout import GridLayout

class SettingsApp(App):
    use_kivy_settings = False #desativar configuras padrao do kivy
    def open_settings(self, *largs): #impedir q painel padrao de configuracoes apareca
        pass

    def build_config(self, config):
        config.setdefaults('configuracoes', {'config1': 'texto', 'config2': '99'})
        
    def build(self):
        gl = GridLayout(cols=3)
        l1 = Label(text='config1: %s' %(self.config.get('configuracoes', 'config1')))
        it1 = TextInput()
        b1 = Button(text='config1')
        def onpb1():
            self.config.set('configuracoes', 'config1', it1.text) #definindo nova config
            self.config.write() #atualizar arquivo de configuracao
            l1.text = 'config1: ' + self.config.get('configuracoes', 'config1')            
        b1.on_press = onpb1
        gl.add_widget(l1)
        gl.add_widget(it1)
        gl.add_widget(b1)
        return gl
        
    def on_config_change(self, config, section, key, value):
        print('config1 foi alterado: %s %s %s %s'%(config, section, key, value))
  

SettingsApp().run()
