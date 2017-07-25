#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.togglebutton import ToggleButton

class Tela(BoxLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.add_widget(ToggleButton(text='Male', group='sex',))
        self.add_widget(ToggleButton(text='Female', group='sex', state='down'))
        self.add_widget(ToggleButton(text='Mixed', group='sex'))
        self.add_widget(ToggleButton(text='BI', group='sex2',))
        self.add_widget(ToggleButton(text='TRA', group='sex2', state='down'))
        self.add_widget(ToggleButton(text='MUTANTE', group='sex2'))
  
                
class myApp(App):        
    def build(self):        
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
