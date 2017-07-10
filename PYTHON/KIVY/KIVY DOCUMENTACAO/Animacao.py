from kivy.animation import Animation

# MOVE WIDGET DA POSICAO ATUAL PARA A DA ANIMACAO
# transition ou t eh a forma de transicao da animacao, q pode ser funcao da propria classe
anim = Animation(x=100, y=100, t='in_quad', d=2.0)
anim.start(widget)

# juntando um sequencia de animacoes
a = Animation(x=50) + Animation(size=(80, 80))
anim.start(widget)

# animaçoes em paralelo, duas animacoes ao mesmo tempo
anim = Animation(pos=(80, 10))
anim &= Animation(size=(800, 800), duration=2.)
anim.start(widget)

# animacao em que se repete ao terminar
anim = Animation(x=50) + Animation(size=(80, 80), duration=2.)
anim.repeat = True
anim.start(widget)
Animation.cancel_all(widget, 'x') #cancelar todas animacoes

# CARACTERISTICAS
anim.start(widget) #inicia uma animacao
anim.stop(widget) #para uma animacao
anim.cancel(widget) #apara a animacaoe evento on_complete noa sera executado
Animation.stop_all(widget, 'x') #para e afeta todas a s animacoes
Animation.cancel_all(widget, 'y') #para e afeta todas a s animacoes
stop_property(widget, 'x') #para e remove a propriedade da animacao do widget
cancel_property(widget, 'y') #para e remove a propriedade da animacao do widget
anim.duration = 2.0 # tempo duracao de animacao
anim.transition = 'in_quad' # funcao de transicao, pode ser da propeia classe que vc criou
anim.step = 1.0/30.0 # 30 FPS na animacao
anim.have_properties_to_animate #retona true se widget tem uma animacao

#EVENTOS 
anim.on_start #dispara quando a niamacaoe iniciada
anim.on_complete #dispara quandoa  animacao termina
anim.on_progress #dispara euqnato a animcao seta sendo executada

# OBJETO DE TRANSICAO DE COMO A ANIMACAO E FEITA
from kivy.animation import AnimationTransition
at = AnimationTransition()

#transicao padrao do KIVY
anim.transition = 'linear'

anim.transition = 'in_back'
anim.transition = 'in_bounce'
anim.transition = 'in_circ'
anim.transition = 'in_cubic'
anim.transition = 'in_elastic'
anim.transition = 'in_expo'
anim.transition = 'in_quad'
anim.transition = 'in_quart'
anim.transition = 'in_quint'
anim.transition = 'in_sine'

anim.transition = 'in_out_back'
anim.transition = 'in_out_bounce'
anim.transition = 'in_out_circ'
anim.transition = 'in_out_cubic'
anim.transition = 'in_out_elastic'
anim.transition = 'in_out_expo'
anim.transition = 'in_out_quad'
anim.transition = 'in_out_quart'
anim.transition = 'in_out_quint'
anim.transition = 'in_out_sine'

anim.transition = 'out_back'
anim.transition = 'out_bounce'
anim.transition = 'out_circ'
anim.transition = 'out_cubic'
anim.transition = 'out_elastic'
anim.transition = 'out_expo'
anim.transition = 'out_quad'
anim.transition = 'out_quart'
anim.transition = 'out_quint'
anim.transition = 'out_sine'
