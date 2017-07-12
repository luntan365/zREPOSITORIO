ivy.utils.intersection(set1, set2) #Retorna a interseção de 2 listas.
kivy.utils.difference(set1, set2) #Retorna a diferença entre 2 listas.
kivy.utils.strtotuple('(1 , 2, 3)') #converte string em tupla
kivy.utils.get_color_from_hex(s) #Transforma string cor hexa para Color
get_hex_from_color((.25, .77, .90, .5)) #converte em Hexadecimal
kivy.utils.get_random_color(alpha=1.0) #Retorna cor randômica

# Verificar se a plataforma e linux
from kivy.utils import platform
if platform == 'linux':
    do_linux_things()
