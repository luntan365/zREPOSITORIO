
from kivy.uix.boxlayout import BoxLayout
from kivy.app import App

class Ex16(BoxLayout):
    pass
   
class Ex16App(App):
    def build(self):
        return Ex16()

if __name__=='__main__':
    Ex16App().run()
