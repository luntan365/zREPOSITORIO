from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.scrollview import ScrollView
from kivy.uix.behaviors import ButtonBehavior

class ItemLista(ButtonBehavior):
    def __init__(self, indice,  **kwargs):
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
            pagou(self.indice)
            self.parent.remove_widget(self)            
        else:
            self.x = 5
        self.x_inicial = None
    pass
    
# ======================LISTA===============================================        
class ListaTouch(FloatLayout):
    def __init__(self, data, **kwargs):
        super(ListaTouch, self).__init__(**kwargs)
        self.size_hint = (1, .9)
        self.pos_hint = {"x":0, "y":0}        
        lista = GridLayout(cols=1, spacing=5, padding=5, orientation='vertical', size_hint=(1, None))
        lista.bind(minimum_height=lista.setter('height'))
        alternar = True
        for index, valor in lista_ativa:            
            item_lista = ItemLista(index, text=valor)         
            lista.add_widget(item_lista)                        
            pass
        root = ScrollView(size_hint=(1, 1))
        root.add_widget(lista)
        self.add_widget(root)
# ===================ADD=================================================  
class AddPessoa(BoxLayout):
    def __init__(self, **kwargs):
        super(AddPessoa, self).__init__(**kwargs)
        self.orientation='vertical'
        self.size_hint = (1, .4)
        self.pos_hint = {"x":0, "top":0.8}
        self.spacing = 10
        self.padding = 10
        self.ti_nome = TextInput(font_size='40sp', multiline=False)
        self.bt_add = Button(text='Adicionar', font_size='30sp')
        self.bt_add.on_press = self.add_pessoa
        self.bt_cancelar = Button(text='Cancelar', font_size='30sp')
        self.bt_cancelar.on_press = self.cancelar
        self.add_widget(self.ti_nome)
        self.add_widget(self.bt_add)
        self.add_widget(self.bt_cancelar)
        
    def add_pessoa(self):
        insert(self.ti_nome.text)
        self.ti_nome.text = ''
        self.parent.lista_pessoas_update()
        self.parent.remove_widget(self)
        pass
        
    def cancelar(self):
        self.parent.lista_pessoas_update()
        self.parent.remove_widget(self)        
        pass
        
