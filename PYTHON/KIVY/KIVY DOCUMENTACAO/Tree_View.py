#!/usr/bin/env python
# -*- coding: utf-8 -*-
from kivy.app import App
from kivy.uix.boxlayout import BoxLayout
from kivy.uix.treeview import TreeView, TreeViewLabel

class Tela(BoxLayout):
    def __init__(self, **kwargs):
        super(Tela, self).__init__(**kwargs)
        tv = TreeView(hide_root=False, indent_level=4)
        
        n1 = tv.add_node(TreeViewLabel(text='Item 1'))
        tv.add_node(TreeViewLabel(text='SubItem 1'), n1)
        tv.add_node(TreeViewLabel(text='SubItem 2'), n1)
        
        n2 = tv.add_node(TreeViewLabel(text='Item 2'))
        tv.add_node(TreeViewLabel(text='SubItem 1'), n2)
        tv.add_node(TreeViewLabel(text='SubItem 2'), n2)
        
        self.add_widget(tv)
  
                
class myApp(App):        
    def build(self):        
        return Tela()       

if __name__ == '__main__':        
    myApp().run()
