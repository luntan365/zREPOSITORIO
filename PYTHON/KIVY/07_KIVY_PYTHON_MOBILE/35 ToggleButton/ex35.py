from kivy.uix.gridlayout import GridLayout
from kivy.app import App

class Ex35(GridLayout):
    pass
        
class Ex35App(App):
    def build(self):
        return Ex35()

if __name__=='__main__':
    Ex35App().run()
