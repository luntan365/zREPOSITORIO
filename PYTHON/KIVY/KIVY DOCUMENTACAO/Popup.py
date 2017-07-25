#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.label import Label
from kivy.uix.button import Button
from kivy.uix.popup import Popup


class Tela(BoxLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.add_widget(Button(text='Abrir Popup', on_press=self.abrir_popup))
        self.bl = BoxLayout(orientation='vertical')
        self.bl.add_widget(Label(text='Hello world'))
        self.bl.add_widget(Button(text='Fechar Popup', on_press=self.fechar_popup, size_hint_y=.3))        
        self.popup = Popup(title='Menssagem do Popup', content=self.bl, size_hint=(None, None), size=('300dp', '300dp'), auto_dismiss=False) #auto_dismiss o popup não fecha se clicar fora da sua area, assim precisa criar botao de fechar
        
    def abrir_popup(self, arg):
        self.popup.open()
                
    def fechar_popup(self, arg):
        self.popup.dismiss()
        
class myApp(App):
    def build(self):
        return Tela()        

if __name__ == '__main__':        
    myApp().run()
