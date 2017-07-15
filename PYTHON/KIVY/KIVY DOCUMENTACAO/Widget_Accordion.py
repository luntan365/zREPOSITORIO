from kivy.uix.accordion import Accordion, AccordionItem
from kivy.uix.label import Label
from kivy.app import App

class AccordionApp(App):    
    def build(self):
        root = Accordion(orientation='vertical')
        for x in range(5):
            item = AccordionItem(title='Title %d' % x)
            item.add_widget(Label(text='Very big content\n' * 10))
            root.add_widget(item)
        return root

if __name__ == '__main__':
    AccordionApp().run()
    
# min_space=60 = espaço entre as barras do accordeon
# background_normal='image_when_collapsed.png'
# background_disabled_normal
# background_selected='image_when_selected.png'
# background_disabled_selected
# anim_duration = .25  = duracaod a animacao
# collapse = se item esta recolhido ou nao
