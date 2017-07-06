from kivy.uix.boxlayout import BoxLayout
from kivy.app import App
from kivy.uix.button import Button

import time

class HelloWorld(BoxLayout):
    def __init__(self, **kwargs):
        super(HelloWorld, self).__init__(**kwargs)

        btn1 = Button(text="Hello")
        btn1.bind(on_press=self.hello)
        self.add_widget(btn1)

        btn2 = Button(text="World!")
        btn2.bind(on_press=self.world)
        self.add_widget(btn2)

    def hello(self, obj):
        print("--> Hello at time %s" % time.ctime())

    def world(self, obj):
        print("--> World! at time %s" % time.ctime())
   
class HelloWorldApp(App):
    def build(self):
        return HelloWorld()

if __name__ == "__main__":
    myApp = HelloWorldApp()
    print("myApp name is %s" % myApp.name)
    myApp.run()
