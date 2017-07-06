import kivy
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.button import Button

kivy.require('1.9.1')
from kivy.app import App

def func_self(x):
    print("func_self")
Button.func_self= func_self

class Tela(BoxLayout):
    def func_root(self):
        print('func_root')



class JanelaApp(App):
    def func_app(self):
        print('func_app')
    pass

janela = JanelaApp()
janela.run()
