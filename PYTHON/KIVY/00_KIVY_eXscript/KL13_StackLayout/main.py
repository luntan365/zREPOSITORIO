# coding: utf-8
import kivy
from kivy.app import App
from kivy.lang import Builder
from kivy.config import Config

kivy.require('1.9.1')

codigo = """
<Tela@StackLayout>:
    orientation: "tb-lr"
    Button:
        text: '1'
        size_hint: .33, .2
    Button:
        text: '2'
        size_hint: .33, .2  
    Button:
        text: '3'
        size_hint: .33, .2
    Button:
        text: '4'
        size_hint: .33, .2
    Button:
        text: '5'
        size_hint: .33, .2
    Button:
        text: '6'
        size_hint: .33, .2
    Button:
        text: '7'
        size_hint: .33, .2
    Button:
        text: '8'
        size_hint: .33, .2
Tela:
"""

class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

JanelaApp().run()
