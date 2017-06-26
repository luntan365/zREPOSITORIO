import kivy
from kivy.properties import NumericProperty
from kivy.app import App
from kivy.uix.button import Button

class janela(App):
    count = NumericProperty(0)

    def build(self):
        self.bind(count=self.update_widg)
        self.btn = Button(text="Hello World!", font_size="20dp")
        self.btn.bind(on_press=self.increment)
        return self.btn
        pass

    def increment(self, button):
        self.count += 1
        pass

    def update_widg(self, app, value):
        self.btn.text = 'Hello World! {}'.format(self.count)
        pass

if __name__ == '__main__':
    janela().run()
    pass
