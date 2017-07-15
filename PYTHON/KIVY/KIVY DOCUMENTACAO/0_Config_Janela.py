#!/usr/bin/env python
# -*- coding: utf-8 -*-
import kivy
kivy.require('1.9.1')
kivy.compat.PY2 = True #usa o python 2
from kivy.app import App
from kivy.uix.label import Label

from kivy.config import Config
Config.set('graphics', 'desktop', '0') # sem borda
Config.set('graphics', 'borderless', '0') # sem borda
Config.set('graphics', 'window_state', 'visible') # maximizado
Config.set('graphics', 'resizable', '1') #janela redimensionavel
Config.set('graphics', 'fullscreen', '0') #tela cheia
Config.set('graphics', 'show_cursor', '1') #mostrar mouse
Config.write()

# kivy, desktop: int, 0 or 1 - se app for desktop ative
# kivy, pause_on_minimize: int, 0 or 1 - se desktop ativo: pausa a aplicacao quando ativado

# graphics, borderless: 0 or 1, remove borda da janela
# graphics, window_state: visible, hidden, 'maximized ou minimized
# graphics, fullscreen: 0, 1, fake ou auto
# graphics, resizable: 0 ou 1 - se a janela pode ser redimensionada
# graphics, maxfps: padrão é 60
# graphics, height: Altura da Window, não será se fullscreen for definido como auto.
# graphics, width: Largura da Window, não será se fullscreen for definido como auto.
# graphics, minimum_width: - Largura mínima para restringir a janela
# graphics, minimum_height: - Altura mínima para restringir a janela
# graphics, left: posicao a esquerda
# graphics, top: posicao a topo
# graphics, multisamples’: padrão 2 - aumente valor pro grafico ficar mais suave e pesado
# graphics, position: 'auto’ ou 'custom’ - Se 'auto' não terá controle da posição top e left
# graphics, show_cursor: 0 ou 1 - mostrar mause
# graphics, rotation: 0, 90, 180 ou 270 - Rotação da Window.



class myApp(App):
    def build(self):        
        return Label(text='Geral')
        
if __name__ == '__main__':        
    myApp().run()
