class MyObject:
    def __init__(self, text=''):
        self.text = text
        
        
class MyList(ListView):
    def list_item_args_converter(self, row_index, obj):
        return {'text': obj.text}
        
    def update(self):
        self.adapter.data = [
            MyObject('Fred'),
            MyObject('Bob'),
        ]
        

class MyScreen(Screen):
    my_list = ObjectProperty()
    
    def on_pre_enter(self):
        self.my_list.update()
