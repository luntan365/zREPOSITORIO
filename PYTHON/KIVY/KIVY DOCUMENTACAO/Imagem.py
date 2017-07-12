# carregar uma imagem com um nome de um arquivo
from kivy.core.image import Image
im = Image("image.png")

# carregar os dados da imagem diretamente de um bloco da memória
import io
from kivy.core.image import Image
data = io.BytesIO(open("image.png", "rb").read())
im = Image(data, ext="png")

 # para imagem ficar salva em cache informe o filename 
im = Image(data, ext="png", filename="image.png")

# Savar imagem
from kivy.core.image import Image
img = Image('hello.png')
img.save('hello2.png')

# salvar textura
texture = Texture.create(...)
img = Image(texture)
img.save('hello3.png')


# for example, load a 128x128 image that contain 4 64x64 images
from kivy.core.image import Image
texture = Image('mycombinedimage.png').texture
bottomleft = texture.get_region(0, 0, 64, 64)
bottomright = texture.get_region(0, 64, 64, 64)
topleft = texture.get_region(0, 64, 64, 64)
topright = texture.get_region(64, 64, 64, 64)
