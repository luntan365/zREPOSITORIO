from kivy.app import App
from kivy.uix.carousel import Carousel
from kivy.uix.image import AsyncImage

class CarouselApp(App):
    def build(self):
        carousel = Carousel(direction='right', loop='True')
        for i in range(10):
            src = "http://placehold.it/480x270.png&text=slide-%d&.png" % i
            image = AsyncImage(source=src, allow_stretch=True)
            carousel.add_widget(image)
        return carousel
    
CarouselApp().run()

# direction = right, left, top, ou bottom
# index - Slider atual
# load_next(mode='next') - passar proximo Slider
# load_previous() - ir slider anteriro
# loop = True - ao chegar ultimo slider volte ao primeiro
# anim_type = 'out_quad' - tipo de anmacao
# load_slide(slide) - vai pro slider passado
# slides - retorna lista de slider
