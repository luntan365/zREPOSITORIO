from socket import *


msg = ''
while msg!='0':
    try:
        print('Escreva mensagem, 0 - para sair')
        msg = input()
        
        skt = socket(AF_INET, SOCK_STREAM)
        skt.connect(('localhost', 50007))
        skt.send(msg.encode('ascii'))
        data = skt.recv(1024)
        print('RECEBEU=>: ', data.decode('utf-8'))
        skt.close()

    except Exception as e:
        print(e)




input()
