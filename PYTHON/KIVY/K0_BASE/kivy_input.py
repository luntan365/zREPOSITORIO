#conding: utf-8
from kivy.app import App
from kivy.uix.textinput import TextInput
try:

    def build():
        return TextInput(text="insira o texto aqui")

    janela = App()
    janela.build = build
    janela.run()

except Exception as e:
    print(e)
    input()
