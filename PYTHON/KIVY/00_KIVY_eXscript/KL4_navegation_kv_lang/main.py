import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label


class Tela1(BoxLayout):
    def on_press_bt(self):
        janela.root_window.remove_widget(janela.root)
        janela.root_window.add_widget(Tela2())

class Tela2(BoxLayout):
    def on_press_bt(self):
        janela.root_window.remove_widget(janela.root)
        janela.root_window.add_widget(Tela1())


class JanelaApp(App):
    def build(self):
        return Tela1()


janela = JanelaApp()
janela.run()