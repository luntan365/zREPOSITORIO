from kivy.uix.relativelayout import RelativeLayout
from kivy.app import App

class Ex11(RelativeLayout):
    pass
   
class Ex11App(App):
    def build(self):
        return Ex11()

if __name__=='__main__':
    Ex11App().run()
