#conding: utf-8
from kivy.app import App
from kivy.uix.button import Button
try:

    def click():
        print("clicou no botao")

    def build():
        bt = Button(text="Button", font_size=100)
        bt.on_press = click
        return bt

    janela = App()
    janela.build = build
    janela.run()

except Exception as e:
    print(e)
    input()
