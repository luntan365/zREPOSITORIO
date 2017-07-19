from kivy.uix.textinput import TextInput

class DTextInput(TextInput):
    def __init__(self, **kwargs):        
        super(DTextInput, self).__init__(**kwargs)
        self.multiline = False
        self.font_size = 30
        # self.size_hint_y = None
        # self.height = self.minimum_height        
        self.background_normal = 'img/widgets/textinput_normal.png'
        self.background_active = 'img/widgets/textinput_active.png'
        # self.cursor_color = 0.498, 0.549, 0.552,1.0
        # self.foreground_color = 0.204, 0.286, 0.369, 1.0
        # self.selection_color = 0.925, 0.941, 0.937, 0.5
        self.padding = '10dp', '10dp'
        self.halign = 'justify'
        self.border = 10,10,10,10
