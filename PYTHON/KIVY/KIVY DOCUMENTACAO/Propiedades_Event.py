# adicionando propriedade
def my_press_callback(obj):
    print('event on object', obj)
self.bind(on_press=my_press_callback)

self.events() #retorna todos os eventos
self.get_property_observers() #retorna a lista de propriedades do objeto
self.is_event_type('on_press') #Retorna True se o event_type já estiver registrado
self.properties() #Retorna todas as propriedades da classe em dicionário
self.property('on_press') #Pega a instância da propriedade de um nome
self.unbind('on_press') #Desvincular propriedades 

# criando propriedade
mywidget = Widget()
mywidget.create_property('custom')
mywidget.custom = True
print(mywidget.custom)

# setando a propedade
def my_x_callback(obj, value):
    print('on object', obj, 'x changed to', value)
def my_width_callback(obj, value):
    print('on object', obj, 'width changed to', value)
self.bind(x=my_x_callback, width=my_width_callback)
