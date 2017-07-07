# coding: utf-8
import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout 
from kivy.uix.listview import ListItemButton
from kivy.properties import ObjectProperty

class EstudanteListButton(ListItemButton):
    pass

class EstudanteDB(BoxLayout):
    nome_input_text = ObjectProperty()
    sobrenome_input_text = ObjectProperty()
    lista_estudante = ObjectProperty()
    pass

    def adicionar_estudante(self):
        #pegar texto do inputs
        nome_completo = self.nome_input_text.text + " " + self.sobrenome_input_text.text
        #adicionar a lista de nomes
        self.lista_estudante.adapter.data.extend([nome_completo])
        #atualizar nomes com um gatilho
        self.lista_estudante._trigger_reset_populate()
        pass
        
    def alterar_estudante(self):
        #verificar se existe algum item selecionado
        if self.lista_estudante.adapter.selection:
            #pegando referencia do ityem selcionado
            selecionado = self.lista_estudante.adapter.selection[0].text
            #remover da lista
            self.lista_estudante.adapter.data.remove(selecionado)
            #pegar texto do inputs
            nome_completo = self.nome_input_text.text + " " + self.sobrenome_input_text.text
            #adicionar a lista de nomes
            self.lista_estudante.adapter.data.extend([nome_completo])
            #atualizar nomes com um gatilho
            self.lista_estudante._trigger_reset_populate()
        pass
        
    def excluir_estudante(self):
        #verificar se existe algum item selecionado
        if self.lista_estudante.adapter.selection:
            #pegando referencia do ityem selcionado
            selecionado = self.lista_estudante.adapter.selection[0].text
            #remover da lista
            self.lista_estudante.adapter.data.remove(selecionado)
            #atualizar nomes com um gatilho 
            self.lista_estudante._trigger_reset_populate()
        pass

class EstudanteApp(App):
    def build(self):
        return EstudanteDB()

if __name__ == '__main__':
    EstudanteApp().run()
    pass
