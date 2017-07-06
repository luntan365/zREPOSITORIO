from kivy.uix.stacklayout import StackLayout
from kivy.app import App

class MyStack(StackLayout):
    pass
   
class Ex7App(App):
    def build(self):
        return MyStack()

if __name__=='__main__':
    Ex7App().run()
