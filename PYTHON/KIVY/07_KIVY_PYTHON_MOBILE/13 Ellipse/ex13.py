from kivy.uix.gridlayout import GridLayout
from kivy.app import App

class Ex13(GridLayout):
    pass
   
class Ex13App(App):
    def build(self):
        return Ex13()

if __name__=='__main__':
    Ex13App().run()
