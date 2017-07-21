from kivy.uix.floatlayout import FloatLayout
from kivy.uix.gridlayout import GridLayout
from kivy.uix.scrollview import ScrollView
from kivy.uix.button import Button

class ListaTouch(FloatLayout):
    def __init__(self, listatouch=[], acao=None , img_fundo='blue', **kwargs):
        super(ListaTouch, self).__init__(**kwargs)
        self.listatouch = listatouch
        self.acao = acao
        self.img_fundo = img_fundo
        self.scrollview = ScrollView(size_hint=(1, 1), scroll_timeout=250, scroll_distance=20)
        self.preencher_lista()
        self.add_widget(self.scrollview)
        pass

    def update_lista(self, listatouch=None, acao=None):
        if listatouch is not None:
            self.listatouch = listatouch
        if acao is not None:
            self.acao = acao
        self.scrollview.clear_widgets()
        self.preencher_lista()
        pass

    def preencher_lista(self):
        grade_lista = GridLayout(cols=1, spacing=10, padding=5, orientation='vertical', size_hint=(1, None))
        grade_lista.bind(minimum_height=grade_lista.setter('height'))
        for index, valor in self.listatouch:
            grade_lista.add_widget(ItemLista(indice=index, acao=self.acao, img_fundo=self.img_fundo, text=valor))
        self.scrollview.add_widget(grade_lista)
        pass



class ItemLista(Button):
    def __init__(self, indice=0, acao=None, img_fundo='blue',  **kwargs):
        super(ItemLista, self).__init__(**kwargs)
        self.indice = indice
        self.acao = acao
	self.x_inicial = None
        self.size_hint =(None, None)
        self.height ='60dp'
	self.width = '400dp'
        self.font_size ='30sp'
	self.text_size = self.size
	self.padding_x = '15dp'
	self.halign = 'left'
	self.valign = 'middle'
        if img_fundo == 'blue':
            self.background_normal = 'img/widgets/b_blue_down.png'
            self.background_down = 'img/widgets/b_blue.png'
        if img_fundo == 'green':
            self.background_normal = 'img/widgets/b_turq_down.png'
            self.background_down = 'img/widgets/b_turq.png'
        if img_fundo == 'red':
            self.background_normal = 'img/widgets/b_red_down.png'
            self.background_down = 'img/widgets/b_red.png'

    def on_touch_move(self, mpos):
        x = mpos.pos[0]
        y = mpos.pos[1]
        if self.collide_point(x, y) and self.state == 'down':
            if self.x_inicial  == None:
                self.x_inicial = x
            self.x = (x - self.x_inicial)
            if(self.x > (self.parent.width/8)):
                self.background_color = (0,0,0,0)
            else:
                self.background_color = (1,1,1,1)
        else:
            self.x = 5
	    self.background_color = (1,1,1,1)

    def on_release(self):
        if(self.x > (self.parent.width/8)):
            if self.acao is not None:
                self.acao(self.indice)
            self.parent.remove_widget(self)
        else:
            self.x = 5
        self.x_inicial = None
    pass
