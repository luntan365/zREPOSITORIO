#-*- coding: utf-8 -*-
import kivy
kivy.require('1.9.0')
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from lib.listatouch import ListaTouch
from lib.crud import Crud
from lib.dtextinput import DTextInput
from kivy.graphics import Rectangle, Color

from kivy.config import Config
Config.set('graphics', 'height', '600')
Config.set('graphics', 'width', '400')
# ====================================================================
crud = Crud()
# ===================TELA=================================================
class Tela(FloatLayout):

    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)        
                    
        # Tela de Adicionar Pessoa
        self.bl_add = BoxLayout(orientation='vertical', size_hint = (1, .4), pos_hint = {"x":0, "top":0.9}, spacing = 10, padding = 10)
        self.ti_nome = DTextInput()
        self.bl_add.add_widget(self.ti_nome)
        self.bl_add.add_widget(Button(text='Adicionar', font_size='30sp', on_press=self.add_pessoa_add, background_normal='img/widgets/but_turq.png', background_down='img/widgets/but_turq_down.png'))
        self.bl_add.add_widget(Button(text='Cancelar', font_size='30sp', on_press=self.cancelar, background_normal='img/widgets/but_red.png', background_down='img/widgets/but_red_down.png'))

        # Tela comfirmar resete
        self.bl_reset = BoxLayout(orientation='vertical', size_hint = (1, .3), pos_hint = {"x":0, "bottom":0.2}, spacing = 10, padding = 10)
        self.bl_reset.add_widget(Button(text='Resetar', font_size='30sp', on_press=self.resetar_confirma, background_normal='img/widgets/but_turq.png', background_down='img/widgets/but_turq_down.png'))
        self.bl_reset.add_widget(Button(text='Cancelar', font_size='30sp', on_press=self.cancelar, background_normal='img/widgets/but_red.png', background_down='img/widgets/but_red_down.png'))

        # Tela Inicial - Lista de Pendentes
        self.conteiner = BoxLayout(size_hint=(1,.9), pos_hint={'x':0,'y':0})
        self.add_widget(self.conteiner)
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar(0), acao=self.acao_pagou))
            
    def pendentes(self):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar(0), acao=self.acao_pagou))

    def pagou(self):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar(1), acao=self.acao_pedente, img_fundo='green'))

    def resetar(self):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(self.bl_reset)

    def remover_pessoa(self):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar_todos(), acao=self.acao_apagar, img_fundo='red'))

    def add_pessoa(self):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(self.bl_add)
        self.ti_nome.focus = True
        
    def add_pessoa_add(self, arg):
        nome = self.ti_nome.text.strip()
        if bool(nome):
            crud.add_pessoa(nome)
        self.ti_nome.text = ''        

    def cancelar(self, arg):
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar(0), acao=self.acao_pagou))

    def resetar_confirma(self, arg):
        crud.resetar_lista()
        self.conteiner.clear_widgets()
        self.conteiner.add_widget(ListaTouch(listatouch=crud.listar(0), acao=self.acao_pagou))

    def acao_pagou(self, indice):
        crud.pagou_async(indice)

    def acao_pedente(self, indice):
        crud.pendente_async(indice)

    def acao_apagar(self, indice):
        crud.remover_pessoa_async(indice)

    pass

# ===================APP================================================
class VoleiApp(App):
    def build(self):
        self.title = "Volei"
        return Tela()
    pass

if __name__ == '__main__':
    VoleiApp().run()
    pass
