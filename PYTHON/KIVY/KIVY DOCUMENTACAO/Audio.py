rom kivy.core.audio import SoundLoader
sound = SoundLoader.load('mytest.wav')
if sound:
    print("Sound found at %s" % sound.source)
    print("Sound is %.3f seconds" % sound.length)
    sound.play()

# Eventos
# on_play: NoneDisparado quando o som é tocado
# on_stop: NoneDisparado quando o som é pausado

from kivy.core.audio import SoundLoader
# Carregar um som, usando o melhor carregador para o tipo de arquivo determinado.
#SoundLoader.load(filename) # Carrega um som, e retorna uma instância de Sound().
#SoundLoader.static register(classobj) # Registra uma nova classe para abrir o som

#Metodos
# play() Toca o arquivo.
# stop() Para o reprodução.
# seek(position) Vá para a <position> (em segundos).
# get_pos() Retorna a posição atual do arquivo de áudio. Retorna 0 se não estiver to- cando.Novo na versão 1.4.1.
# length() Obtém o tamanho do som (em segundos).
# load() Abre o arquivo para a memória;
# unload() Remove o arquivo da memória.
# volume() Volume, intervalo entre 0-1. 1 significa o volume máximo, 0 significa o volume mínimo.
# loop() Defina como True se o som deve repetir automaticamente quando terminar.Novo na versão 1.8.0. loop é um BooleanProperty e o padrão é False.
# source() Nome do arquivo/source do seu arquivo de áudio.
# state() Estado do som, uma das seguintes opções, ‘stop’ ou ‘play’
