from kivy.uix.dropdown import DropDown 
from kivy.uix.button import Button
from kivy.base import runTouchApp

dropdown = DropDown()
for index in range(10):
    btn = Button(text='Value %d' % index, size_hint_y=None, height=44)
    btn.bind(on_release=lambda btn: dropdown.select(btn.text))
    dropdown.add_widget(btn)
mainbutton = Button(text='Hello', size_hint=(None, None))
mainbutton.bind(on_release=dropdown.open)
dropdown.bind(on_select=lambda instance, x: setattr(mainbutton,'text', x))
runTouchApp(mainbutton)


kv = """
<CustomDropDown>:
    Button:
        text: 'My first Item'
        size_hint_y: None
        height: 44
        on_release: root.select('item1')
    Label:
        text: 'Unselectable item'
        size_hint_y: None
        height: 44
    Button:
        text: 'My second Item'
        size_hint_y: None
        height: 44
        on_release: root.select('item2')
"""


#criar uma associação com uma classe Python e utiliza-la
class CustomDropDown(DropDown):
    pass
dropdown = CustomDropDown()
mainbutton = Button(text='Hello', size_hint=(None, None))
mainbutton.bind(on_release=dropdown.open)
dropdown.bind(on_select=lambda instance, x: setattr(mainbutton,'text', x))


#eventos
on_select
on_dismiss
