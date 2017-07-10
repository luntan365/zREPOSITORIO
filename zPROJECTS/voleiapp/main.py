# coding: utf-8
import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.uix.listview import ListItemButton, ListItemLabel, CompositeListItem, ListView
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.gridlayout import GridLayout
from kivy.adapters.dictadapter import DictAdapter
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label
from kivy.core.window import Window
from kivy.graphics import Color, Rectangle
from kivy.properties import ObjectProperty


Window.size = 350, 550
lista_pagantes = ['monique', 'jannarynna']
lista_pendentes = ['Dejota Freitas', 'Amanda Raquel', 'Diego Alef', 'Diego', 'Rodrigo','Monique Amarela', 'jannarynna de Rodrigo','Amigo de Diego', 'Magrinha Alta', 'Amanda Raquel', 'Diego Alef', 'Diego', 'Rodrigo','Monique Amarela', 'jannarynna de Rodrigo','Amigo de Diego', 'Magrinha Alta']

integers_dict = {str(index): {'text': str(valor), 'is_selected': False} for index, valor in enumerate(lista_pendentes)}
lista_ativa_tipo = False
list_view = None

class BotaoLista(ListItemButton):
    def __init__(self, indice=-1, **kwargs):
        super(BotaoLista, self).__init__(**kwargs)
        self.indice = indice       
    def on_press(self):        
        print('INDEX: '+str(self.indice))
        print(list_view.adapter.data)
        list_view._trigger_reset_populate()        
    pass
    
class LabelLista(ListItemLabel):
    def __init__(self, **kwargs):
        super(LabelLista, self).__init__(**kwargs)
        self.halign="left"
        self.valign="middle"
        self.bind(size=self.setter('text_size'))
    pass 
        
class ListaAtiva(FloatLayout):
    def __init__(self, **kwargs):
        kwargs['cols'] = 2
        super(ListaAtiva, self).__init__(**kwargs)

        args_converter = lambda row_index, rec: {
            'text': rec['text'],            
            'size_hint_y': None,
            'height': 50,
            'cls_dicts': [{
                           'cls': LabelLista,
                           'kwargs': {
                               'text': rec['text'],
                               'is_representing_cls': True,
                               'font_size': '20sp',      
                               'size_hint_x': '2'}},
                           {
                           'cls': BotaoLista,
                           'kwargs': {'text':'Pagou '+str(row_index),
                                       'deselected_color':[.5,.5,.5,1],
                                       'selected_color':[1.,1.,1.,1],
                                       'indice':row_index 
                                       }}] 
                            }

    
        item_strings = ["{0}".format(index) for index in range(len(integers_dict))]

        dict_adapter = DictAdapter(sorted_keys=item_strings,
                                   data=integers_dict,
                                   args_converter=args_converter,
                                   selection_mode='single',
                                   allow_empty_selection=False,
                                   cls=CompositeListItem)

        list_view = ListView(adapter=dict_adapter)
        list_view.container.padding = 10
        list_view.container.spacing = 10
        self.add_widget(list_view)        
    pass
            
class Tela(FloatLayout):
        
    def add_pessoa(self):
        self.ids.caixa_texto.text

    def cancelar_pesquisa(self):
        self.ids.caixa_texto.text

    def listar_pendentes(self):
        self.ids.caixa_texto.text

    def listar_pagantes(self):
        self.ids.caixa_texto.text
                
    def relatorio(self):
        self.ids.caixa_texto.text
    pass


  
class VoleiApp(App):    
    def build(self):
        self.title = "Volei"
        return Tela()
    pass
    
if __name__ == '__main__':
    VoleiApp().run()
    pass
