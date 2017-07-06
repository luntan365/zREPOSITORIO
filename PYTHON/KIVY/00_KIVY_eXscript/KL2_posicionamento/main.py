#conding: utf-8
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label

class RootWidget(FloatLayout):
    pass

class JanelaApp(App):
    def build(self):
        return RootWidget()

JanelaApp().run()
