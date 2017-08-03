from kivy.app import App
from kivy.uix.label import Label
from kivy.uix.boxlayout import BoxLayout
from math import fabs
class JB(BoxLayout):
    def __init__(self, **kwargs):
        super(JB, self).__init__(**kwargs)
        self.x_inicial = 0
        self.y_inicial = 0
        self.x_final = 0
        self.y_final = 0
        self.direcao_Label = Label(text='...')
        self.add_widget(self.direcao_Label)

    def calcular_direcao(self):
        direita_ou_esquerda = self.x_inicial - self.x_final
        cima_ou_baixo = self.y_inicial - self.y_final    
        if fabs(direita_ou_esquerda) > fabs(cima_ou_baixo):
            if self.x_inicial < self.x_final:
                self.direcao_Label.text = "DIREITA"                
            else:
                self.direcao_Label.text = "ESQUERDA"                              
        else:
            if self.y_inicial < self.y_final:
                self.direcao_Label.text = "TOPO"
            else:
                self.direcao_Label.text = "BAIXO"
        

    def on_touch_down(self, touch):
        self.x_inicial = touch.pos[0]
        self.y_inicial = touch.pos[1]

    def on_touch_up(self, touch):
        self.x_final = touch.pos[0]
        self.y_final = touch.pos[1]
        self.calcular_direcao()   

    # def on_touch_move(self, touch):
    #     self.x_final = touch.pos[0]
    #     self.y_final = touch.pos[1]
        # print self.x_final, self.y_final


            
class MyJBApp(App):
    def build(self):
        self.parent = JB()
        return self.parent

if __name__ == '__main__':
    MyJBApp().run()
