import kivy
kivy.require('1.9.0')
from kivy.app import App
from kivy.uix.scatter import Scatter
from kivy.uix.label import Label
from kivy.uix.floatlayout import FloatLayout


class JanelaApp(App):
    def build(self):
        f = FloatLayout()
        s = Scatter()
        l = Label(text='Heloo World!!!')
        f.add_widget(s)
        s.add_widget(l)
        return f
    pass


JanelaApp().run()
