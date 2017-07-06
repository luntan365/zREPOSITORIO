# coding: utf-8
import kivy
from kivy.app import App
from kivy.lang import Builder
from kivy.config import Config

kivy.require('1.9.1')

codigo = """
<Tela@FloatLayout>:
    Button:
        text: 'Top Left'
        size_hint: .3, .3
        pos_hint: {"x":0, "top":1}
    Button:
        text: 'Top Right'
        size_hint: .3, .3
        pos_hint: {"right":1, "top":1}       
    Button:
        text: 'CENTER'
        size_hint: .4, .4
        pos_hint: {"center_x":.5, "center_y":.5}
    Button:
        text: 'Bottom Left'
        size_hint: .3, .3
        pos_hint: {"x":0, "y":0}
    Button:
        text: 'Bottom Right'
        size_hint: .3, .3
        pos_hint: {"y":0, "right":1}
Tela:
"""

class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

JanelaApp().run()
