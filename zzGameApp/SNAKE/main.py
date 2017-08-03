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
# ======================CONFIG==============================================
ALTURA = int(720/1.25)
LARGURA = int(1280/1.25)
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
        self.velocity_x = NumericProperty(0)
        self.velocity_y = NumericProperty(0)
        self.velocity = ReferenceListProperty(self.velocity_x, self.velocity_y)

    def move(self):
        self.pos = Vector(*self.velocity) + self.pos
    pass
    
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
