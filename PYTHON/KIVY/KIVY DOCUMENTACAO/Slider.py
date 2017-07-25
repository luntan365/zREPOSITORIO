#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.slider import Slider

class Tela(BoxLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.add_widget(Slider(min=0, max=100, value=50, value_track=True, value_track_color=[1, 0, 0, 1]))
        self.add_widget(Slider(orientation='vertical'))
  
                
class myApp(App):        
    def build(self):        
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
