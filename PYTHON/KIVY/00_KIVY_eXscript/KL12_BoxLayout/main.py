# coding: utf-8
import kivy
from kivy.app import App
from kivy.lang import Builder
from kivy.config import Config

kivy.require('1.9.1')

codigo = """
<Tela@BoxLayout>:
    orientation: "vertical"
    padding: 10
    spacing: 10
    Button:
        text: 'Top Left'
        size_hint: 1, 1
    Button:
        text: 'Top Right'
        size_hint: 1, 1   
    Button:
        text: 'CENTER'
        size_hint: 1, 1
    Button:
        text: 'Bottom Left'
        size_hint: 1, 1
    Button:
        text: 'Bottom Right'
        size_hint: 1, 1
Tela:
"""

class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

JanelaApp().run()
