from kivy.uix.gridlayout import GridLayout
from kivy.app import App

class Ex12(GridLayout):
    pass
   
class Ex12App(App):
    def build(self):
        return Ex12()

if __name__=='__main__':
    Ex12App().run()
