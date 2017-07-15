


layout = BoxLayout(orientation='vertical', spacing=10)
btn1 = Button(text='Hello', size=(200, 100), size_hint=(None, None))
btn2 = Button(text='Kivy', size_hint=(.5, 1))
btn3 = Button(text='World', size_hint=(.5, 1))
layout.add_widget(btn1)
layout.add_widget(btn2)
layout.add_widget(btn3)
