#conding: utf-8
from kivy.app import App
from kivy.core.window import Window
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label

try:
    Window.size = 530, 600

    def click():
        print("CLICOU")

    def build():
        ed = TextInput(text="Dejota")
        ed.size_hint = None, None
        ed.height = 300
        ed.width = 400
        ed.x = 60
        ed.y = 250

        bt = Button(text="Click Aqui")
        bt.size_hint = None, None
        bt.width = 200
        bt.height = 50
        bt.y = 150
        bt.x = 160
        bt.on_press = click

        layout = FloatLayout()
        layout.add_widget(ed)
        layout.add_widget(bt)
        return layout

    janela = App()
    janela.title = "Dejota"
    janela.build = build
    janela.run()

except Exception as e:
    print(e)
    input()
