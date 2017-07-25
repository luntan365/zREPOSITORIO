from kivy.uix.textinput import TextInput

class DTextInput(TextInput):
    def __init__(self, **kwargs):
        super(DTextInput, self).__init__(**kwargs)
        self.multiline = False
        self.size_hint_y = None
        self.height='56dp'
        self.font_size = '30sp'
        self.background_normal = 'img/widgets/textinput_normal.png'
        self.background_active = 'img/widgets/textinput_active.png'
        self.padding = '10dp', '10dp'
        self.halign = 'justify'
        self.border = 10,10,10,10
