from kivy.app import App
from kivy.uix.widget import Widget
from kivy.uix.relativelayout import RelativeLayout

class ColorTriangle(Widget):
    pass

class Ex34(RelativeLayout):
    def on_touch_down(self, touch):
        ct = ColorTriangle()
        ct.center = touch.pos
        self.add_widget(ct)

    def on_touch_move(self, touch):
        ct = ColorTriangle()
        ct.center = touch.pos
        self.add_widget(ct)
        
class Ex34App(App):
    def build(self):
        return Ex34()

Ex34App().run()
