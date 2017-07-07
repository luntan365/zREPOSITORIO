from kivy.uix.boxlayout import BoxLayout
from kivy.adapters.dictadapter import ListAdapter
from kivy.uix.button import Button
from kivy.uix.listview import ListView, ListItemButton
from kivy.uix.label import Label
from kivy.uix.gridlayout import GridLayout
from kivy.app import App

from random import randint


class MyApp(App):
    items = 20
    pad = 20
    space = 20
    text_border = 10

    def build(self):
        mainlayout = BoxLayout(orientation = 'vertical')
        self.list_adapter = ListAdapter(data = ["Item #{0}".format(i) for i in range(self.items)], cls = ListItemButton, args_converter=self.list_item_args_converter, sorted_keys = [])
        self.list_view = ListView(adapter=self.list_adapter, size_hint_y=.3)
        self.list_view.container.padding = self.pad
        self.list_view.container.spacing = self.space
        mainlayout.add_widget(self.list_view)
        return mainlayout

    def list_item_args_converter(self,col,obj):
        return {
            'text': obj,
            'size_hint_y': .3,
            'text_size' : (self.root.width-2*self.pad-2*self.text_border , None),
            'height': 32,
            'halign': 'left',
            'valign': 'middle',
            'deselected_color':[.5,.5,.5,1],
            'selected_color':[1.,1.,1.,1]
        }


if __name__ == '__main__':
    MyApp().run()
