# coding: utf-8
import kivy
from kivy.app import App
from kivy.lang import Builder

kivy.require('1.9.1')

codigo = """
#:import HEX kivy.utils.get_color_from_hex

<Tela@BoxLayout>:
    orientation: "vertical"
    Button:
        text: '1'
        size_hint: 1, .2
        background_normal: ""
        background_color: HEX("#3498db")
    Button:
        text: '2'
        size_hint: 1, .2
        background_normal: ""
        background_color: HEX("#d35400")

    Button:
        text: '3'
        size_hint: 1, .2
        background_normal: ""
        background_color: HEX("#2ecc71")
Tela:
"""

class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

JanelaApp().run()
