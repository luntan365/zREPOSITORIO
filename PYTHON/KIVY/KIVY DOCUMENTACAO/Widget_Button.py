from class kivy.uix.button import Button
def callback(instance, value):
    print('My button <%s> state is <%s>' % (instance, value))
button = Button(text='Hello world', font_size=14)
button.bind(on_press=callback) # evento quando for pressionado
button.bind(state=callback) # evento quando ouver um mudanca de estado

button.background_color = (1,1,1,1) # cor de fundo misturado com cinza da imagem fundo padrao, se quiser usar a cor pura defina: button.background_normal =  ''

button.background_normal = 'atlas://data/images/defaulttheme/button'
button.background_down = 'atlas://data/images/defaulttheme/button_pressed'
background_disabled_normal = 'atlas://data/images/defaulttheme/button_disabled'
background_disabled_down = 'atlas://data/images/defaulttheme/button_disabled_pressed'

button.border = (16, 16, 16, 16)
