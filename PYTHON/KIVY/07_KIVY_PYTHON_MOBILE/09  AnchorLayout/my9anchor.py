from kivy.uix.gridlayout import GridLayout
from kivy.app import App

class My9Anchor(GridLayout):
    pass
   
class My9AnchorApp(App):
    def build(self):
        return My9Anchor()

if __name__=='__main__':
    My9AnchorApp().run()
