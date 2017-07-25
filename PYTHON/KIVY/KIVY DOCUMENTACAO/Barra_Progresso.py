#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.progressbar import ProgressBar
import time, thread

class Tela(BoxLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        self.pb = ProgressBar(max=100)
        self.pb.value = 0  # 0%
        self.add_widget(self.pb)

    def progresso_barra(self):
        while True:
            if self.pb.value < 100:
                self.pb.value = self.pb.value + 1
                time.sleep(.1)
            else:
                self.pb.value = 0
                    
class myApp(App):
    def __init__(self, **kwargs):
        super(myApp, self).__init__(**kwargs)
        self.tela = Tela()
        
    def build(self):        
        return  self.tela
        
    def on_start(self):
        thread.start_new_thread(self.tela.progresso_barra, ())     
        pass
       

if __name__ == '__main__':        
    myApp().run()
