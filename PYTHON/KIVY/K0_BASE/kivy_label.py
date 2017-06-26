#conding: utf-8
from kivy.app import App
from kivy.uix.label import Label

def build():
    return Label(text="Hello World", italic=True, font_size=50)
janela = App()
janela.build = build #subistuir o metodo builda da classe App sem invocalo
janela.run()
