from _thread import start_new_thread, allocate_lock
from time import sleep

def execucao(num, tempo):
    while True:
        print("Thread",str(num),"esperando",str(tempo),"segundos...")
        sleep(float(tempo))


def rodar_thread():
    start_new_thread(execucao, (1, 2) )
    start_new_thread(execucao, (2, 2.5) )
    start_new_thread(execucao, (3, 3) )

rodar_thread()


# ========================PONTE===================

# trava = allocate_lock()
#
# def execucao(num, tempo):
#     while True:
#         trava.acquire() #travando execucao da outras threads esperarem essas
#         print("Thread",str(num),"esperando",str(tempo),"segundos...")
#         trava.release() #liberando outras threads executarem
#         sleep(float(tempo))
#
# def rodar_thread():
#     start_new_thread(execucao, (1, 2) )
#     start_new_thread(execucao, (2, 2.5) )
#     start_new_thread(execucao, (3, 3) )
#     print("rodar_thread")
#
# rodar_thread()


input()
