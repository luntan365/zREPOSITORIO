from kivy.adapters.dictadapter import DictAdapter
from kivy.uix.listview import ListItemButton, ListItemLabel, CompositeListItem, ListView
from kivy.uix.gridlayout import GridLayout

integers_dict = {str(i): {'text': str(i), 'is_selected': False} for i in range(100)}


class MainView(GridLayout):

    def __init__(self, **kwargs):
        kwargs['cols'] = 2
        super(MainView, self).__init__(**kwargs)

        args_converter = lambda row_index, rec: {
            'text': rec['text'],
            'size_hint_y': None,
            'height': 25,
            'cls_dicts': [{
                           'cls': ListItemLabel,
                           'kwargs': {
                               'text': "Middle-{0}".format(rec['text']),
                               'is_representing_cls': True}},
                           {
                           'cls': ListItemButton,
                           'kwargs': {'text': rec['text']}}] 
                            }

        item_strings = ["{0}".format(index) for index in range(100)]

        dict_adapter = DictAdapter(sorted_keys=item_strings,
                                   data=integers_dict,
                                   args_converter=args_converter,
                                   selection_mode='single',
                                   allow_empty_selection=False,
                                   cls=CompositeListItem)

        # Use the adapter in our ListView:
        list_view = ListView(adapter=dict_adapter)

        self.add_widget(list_view)


if __name__ == '__main__':
    from kivy.base import runTouchApp
    runTouchApp(MainView(width=800))
