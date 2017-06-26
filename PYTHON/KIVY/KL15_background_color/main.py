# coding: utf-8
import kivy
from kivy.app import App
from kivy.core.window import Window
from kivy.lang import Builder

kivy.require('1.9.1')
# Window.clearcolor = kivy.utils.get_color_from_hex("#f1c40f")
Window.clearcolor = [0,0,0,1]


class JanelaApp(App):
    pass

JanelaApp().run()
