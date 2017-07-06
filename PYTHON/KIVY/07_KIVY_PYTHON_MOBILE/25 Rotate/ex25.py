from kivy.uix.gridlayout import GridLayout
from kivy.app import App

class Ex25(GridLayout):
    pass
        
class Ex25App(App):
    def build(self):
        return Ex25()

if __name__=='__main__':
    Ex25App().run()
