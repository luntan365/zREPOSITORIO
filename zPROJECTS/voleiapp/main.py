# coding: utf-8
import kivy
kivy.require('1.9.1')
import sqlite3
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.scrollview import ScrollView
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.uix.label import Label
from kivy.core.window import Window
from kivy.graphics import Color, Rectangle
from kivy.clock import Clock


Window.size = 350, 550
lista_pendentes = ['Dejota Freitas', 'Amanda Raquel', 'Diego Alef', 'Diego', 'Rodrigo','Monique Amarela', 'jannarynna de Rodrigo','Amigo de Diego', 'Magrinha Alta']
lista_pagantes = ['monique', 'jannarynna']
lista_ativa = lista_pendentes

# =======================DATABASE=============================================
conexao = sqlite3.connect('voleidb.db')
con = conexao.cursor()

def criar_db():
    try:
        con.execute('''
        CREATE TABLE `volei` (
            `id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
            `nome`	TEXT,
            `pagou`	INTEGER);  ''')
    except Exception as e:
        pass
        
def insert(nome):
    con.execute("INSERT INTO volei (nome, pagou) VALUES ('%s', %d)" %(nome, 0))
    conexao.commit()

def pagou(id):
    con.execute("UPDATE volei SET pagou = '%d'  WHERE id = %d" %(0, id))
    conexao.commit()

def reset(id):
    con.execute("UPDATE volei SET pagou = 0")
    conexao.commit()

def delete(id):
    con.execute("DELETE FROM volei WHERE id = %d" %(id))
    conexao.commit()

def select(pagou):
    lista = con.execute("SELECT id, nome FROM volei WHERE pagou = %d" %(pagou))
    lista_dic = {}
    for linha in lista:
        lista_dic[linha[0]] = linha[1]
    return lista_dic   
       

# =======================BOTAO=LISTA==============================================
class ItemLista(Button):
    def __init__(self, indice=0,  **kwargs):
        super(ItemLista, self).__init__(**kwargs)
        self.indice = indice
        self.size_hint=(1, None)
        self.height=60
        self.font_size=20
        self.x_inicial = None

    def on_touch_move(self, mpos):
        x = mpos.pos[0]
        y = mpos.pos[1]
        if(y < (self.y+self.height) and y > self.y):
            if self.x_inicial  == None:
                self.x_inicial = x
            self.x = (x - self.x_inicial)
            if(self.x > (self.parent.width/2)):
                self.background_color = (0,0,0,1)
            else:
                self.background_color = (1,1,1,1)
                
    def on_release(self):
        if(self.x > (self.parent.width/2)):
            self.parent.remove_widget(self)
        else:
            self.x = 5
        self.x_inicial = None
    pass
    
# ======================LISTA===============================================        
class ListaAtiva(FloatLayout):
    def __init__(self, **kwargs):
        super(ListaAtiva, self).__init__(**kwargs)
        self.size_hint = (1, .9)
        self.pos_hint = {"x":0, "y":0}        
        lista = GridLayout(cols=1, spacing=5, padding=5, orientation='vertical', size_hint=(1, None))
        lista.bind(minimum_height=lista.setter('height'))
        
        for index, valor in enumerate(lista_ativa):            
            item_lista = ItemLista(index, text=valor)
            if index % 2 == 0:
                item_lista.background_color = (0.5, 0.5, 0.5, 1)
                pass                    
            lista.add_widget(item_lista)                        
            pass
        root = ScrollView(size_hint=(1, 1))
        root.add_widget(lista)
        self.add_widget(root)

# ===================TELA=================================================    
class Tela(FloatLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        lista_pessoas = ListaAtiva()
        self.add_widget(lista_pessoas)
        
    def add_pessoa(self):
        print 'self.ids.caixa_texto.text'

    def rm_pessoa(self):
        print 'self.ids.caixa_texto.text'

    def pendentes(self):
        print 'self.ids.caixa_texto.text'

    def pagou(self):
        print 'self.ids.caixa_texto.text'
                
    def resetar(self):
        print 'self.ids.caixa_texto.text'
    pass


# ===================APP================================================  
class VoleiApp(App):    
    def build(self):
        self.title = "Volei"
        return Tela()
    pass
volei = VoleiApp()
if __name__ == '__main__':
    volei.run()
    pass
