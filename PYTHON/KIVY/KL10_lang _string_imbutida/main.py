import kivy
kivy.require('1.9.1')
from kivy.lang import Builder
from kivy.app import App

codigo = """
<Tela@BoxLayout>:
    Button:
        text: 'BUTTON'
    Button:
        text: 'BUTTON'
Tela:
"""

class JanelaApp(App):
    def build(self):
        return Builder.load_string(codigo)

janela = JanelaApp()
janela.run()
