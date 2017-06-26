from threading import Thread, Lock
from time import sleep

class MinhaThread(Thread):

    __valor = 1
    __trava = Lock()

    def __init__(self, meuID, dormindo):
        Thread.__init__(self)
        self.meuID = meuID
        self.dormindo = dormindo


    def run(self):
        cont = 0
        for i in range(33):
            with MinhaThread.__trava: #o q ta dentro é travado para outras threads
                print("Thread",str(self.meuID),"valor =",str(MinhaThread.__valor))
                MinhaThread.__valor += 1
            sleep(self.dormindo)
            pass
        pass

t1 = MinhaThread("01", .1)
t2 = MinhaThread("02", .1)
t3 = MinhaThread("03", .1)

#iniciando threadas
t1.start()
t2.start()

#aguarda a threads terminar a execucao
t1.join()
t2.join()

t3.start()
t3.join()

print("todas theads acabram a execucao")

input()
