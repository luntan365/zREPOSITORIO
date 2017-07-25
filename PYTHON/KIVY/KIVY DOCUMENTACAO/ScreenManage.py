#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.screenmanager import Screen, ScreenManager, SwapTransition
from kivy.uix.label import Label
from kivy.uix.button import Button
from kivy.uix.textinput import TextInput
from kivy.uix.widget import Widget
from kivy.uix.gridlayout import GridLayout

class Tela01(Screen):
    def __init__(self, **kwargs):
        super(Tela01, self).__init__(**kwargs)
        self.add_widget(Label(text='Tela 01'))

class Tela02(Screen):
    def __init__(self, **kwargs):
        super(Tela02, self).__init__(**kwargs)
        self.add_widget(TextInput(text='Tela 02'))    

class Tela03(Screen):
    def __init__(self, **kwargs):
        super(Tela03, self).__init__(**kwargs)
        self.add_widget(Button(text='Tela 03'))
        
class Tela(GridLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.cols = 1   
        
        self.gl = GridLayout(orientation='vertical', cols=10)
        self.gl.add_widget(Button(text='Tela 01', on_press=self.go_tela01))
        self.gl.add_widget(Button(text='Tela 02', on_press=self.go_tela02))
        self.gl.add_widget(Button(text='Tela 03', on_press=self.go_tela03))
        self.add_widget(self.gl)
             
        self.screenmanager = ScreenManager(size_hint=(1, 4))
        self.tela01 = Tela01(name='tela-01')
        self.tela02 = Tela02(name='tela-02')
        self.tela03 = Tela03(name='tela-03')
        self.screenmanager.add_widget(self.tela01)
        self.screenmanager.add_widget(self.tela02)
        self.screenmanager.add_widget(self.tela03)          
        self.add_widget(self.screenmanager)
        
    def go_tela01(self, arg):
        self.screenmanager.current = "tela-01"
        
    def go_tela02(self, arg):
        self.screenmanager.current = "tela-02"
            
    def go_tela03(self, arg):
        self.screenmanager.current = "tela-03"

        
class myApp(App):
    def build(self):
        return Tela()        

if __name__ == '__main__':        
    myApp().run()
