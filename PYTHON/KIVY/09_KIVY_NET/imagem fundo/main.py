import kivy
kivy.require('1.9.1')
from kivy.app import App
from kivy.uix.floatlayout import FloatLayout
from kivy.lang import Builder

Builder.load_string('''
    
<RootWidget>
    AsyncImage:
        source:'https://jovemnerd.com.br/wp-content/uploads/2017/03/spider-man-homecoming-poster-760x428.jpg'
        size_hint: 1, 1
        pos_hint: {'center_x':.5, 'center_y': .5}
''')

class RootWidget(FloatLayout): 
    pass

class MainApp(App):
    def build(self):
        return RootWidget()
    
if __name__ == '__main__':
    MainApp().run()
    pass
    
