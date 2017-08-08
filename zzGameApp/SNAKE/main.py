#-*- coding: utf-8 -*-
import kivy
kivy.require('1.9.0')
from kivy.app import App
from kivy.uix.widget import Widget
from kivy.uix.floatlayout import FloatLayout
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.textinput import TextInput
from kivy.uix.button import Button
from kivy.graphics import Rectangle, Color
from kivy.properties import NumericProperty, ReferenceListProperty, ObjectProperty
from kivy.vector import Vector
from kivy.clock import Clock
from kivy.config import Config
from os import system
import math
# ======================CONFIG==============================================
HEIGHT = int(720/1.25)
WIDTH = int(1280/1.25)
coluna = 30
tileSize = math.max(math.floor(WIDTH/coluna), math.floor(HEIGHT/coluna));
Config.set('graphics', 'height', ALTURA)
Config.set('graphics', 'width', LARGURA)
Config.set('graphics', 'maxfps', '60')
# ===================VARIAVEIS=GLOBAIS=====================================
score = 0
# ===================SNAKE=FEED================================================= 
class SnakeFeed(Widget):
    def __init__(self, **kwargs):
        super(SnakeFeed, self).__init__(**kwargs)
        
    pass
# ===================SNAKE=================================================        
class Snake(Widget):
    def __init__(self, **kwargs):
        super(Snake, self).__init__(**kwargs)
        self.x_inicial = 0
        self.y_inicial = 0
        self.x_final = 0
        self.y_final = 0
        self.body = [[2,0], [1,0], [0,0]]
        self.direction = [1, 0];

    def update(self):
        nextPos = [self.body[0][0] + self.direction[0], self.body[0][1] + self.direction[1]]

        # cobra nao pode volta pra traz
        if (nextPos[0] == self.body[1][0] and nextPos[1] == self.body[1][1]):
            if (self.direction[0]==0):
                self.direction[1] *= -1;
            else:
                self.direction[0] *= -1;
            nextPos = [self.body[0][0] + self.direction[0], self.body[0][1] + self.direction[1]];
            

        def on_touch_down(self, touch):
            self.x_inicial = touch.pos[0]
            self.y_inicial = touch.pos[1]
    
        def on_touch_up(self, touch):
            self.x_final = touch.pos[0]
            self.y_final = touch.pos[1]
            self.calcular_direcao()  
             
        def calcular_direcao(self):
            direita_ou_esquerda = self.x_inicial - self.x_final
            cima_ou_baixo = self.y_inicial - self.y_final    
            if fabs(direita_ou_esquerda) > fabs(cima_ou_baixo):
                if self.x_inicial < self.x_final:
                    self.direction = [1, 0]  #"DIREITA"                
                else:
                    self.direction = [-1, 0]  #"ESQUERDA"                              
            else:
                if self.y_inicial < self.y_final:
                    self.direction = [0, -1]  #"TOPO"
                else:
                    self.direction = [0, 1]  #"BAIXO"
                    
    pass #FIM DA CLASSE SNAKE
    
# ===================TELA=JOGO=================================================
class SnakeGame(FloatLayout):
    def __init__(self, **kwargs):
        super(SnakeGame, self).__init__(**kwargs)
    
    snake = ObjectProperty(None)
    snakefeed = ObjectProperty(None)
    score = NumericProperty(0)
    
    def update(self, dt):
        snake.snake.move()
        
        # colidir top e bottom
        if (self.snake.y < self.y) or (self.snake.top > self.top):
            self.snake.velocity_y *= -1

    
    def on_touch_move(self, touch):
        pass            
    pass            
# ===================APP================================================
class GameApp(App):
    
    def build(self):
        self.title = "Snake Game"
        return SnakeGame()
        
    def on_start(self):
        print("on_start")

    def on_stop(self):
        print("on_stop")
        
    def on_pause(self):
        print("on_pouse")
        return True

    def on_resume(self):
        print("on_resume")
        
    pass
    
# ===================MAIN=START================================================
if __name__ == '__main__':
    GameApp().run()
    pass
