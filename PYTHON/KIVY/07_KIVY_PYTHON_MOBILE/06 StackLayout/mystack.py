from kivy.uix.stacklayout import StackLayout
from kivy.lang import Builder
from kivy.app import App

Builder.load_file('mystack_bt_lr.kv')

class MyStack(StackLayout):
    pass
   
class MyStackApp(App):
    def build(self):
        return MyStack()

if __name__=='__main__':
    MyStackApp().run()
