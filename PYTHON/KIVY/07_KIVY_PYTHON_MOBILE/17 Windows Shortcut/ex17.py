from kivy.uix.boxlayout import BoxLayout
from kivy.app import App

class Ex17(BoxLayout):
    pass
   
class Ex17App(App):
    def build(self):
        return Ex17()

if __name__=='__main__':
    Ex17App().run()
