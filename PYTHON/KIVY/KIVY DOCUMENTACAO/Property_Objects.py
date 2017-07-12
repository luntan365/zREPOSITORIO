from kivy.properties import NumericProperty

x = Property('Hello world')
x = ObjectProperty(1.0)
np = NumericProperty(1.0)
op = BooleanProperty(True)
state = OptionProperty("None", options=["On", "Off", "None"])
pos = ReferenceListProperty(NumericProperty(1),NumericProperty(3))
dicionario = DictProperty({'1':'sss', '2':'qqq', '3':'nnn'})
lista = ListProperty([1, 2, 3, 4, 6, 8])
vlista = VariableListProperty([1, 2, 3, 4]) #sempre tem tamanho 4



my_list_prop = ListProperty([1, {'hi': 0}])
my_list_prop[0] = 4

#retorn 0  se nao for entre 0 a 100
a = BoundedNumericProperty(1, min=0, max=100, errorvalue=0) 
a = 50
