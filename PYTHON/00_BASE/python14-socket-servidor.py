from socket import *
try:
    sockobj = socket(AF_INET, SOCK_STREAM)
    sockobj.bind(('', 50007))
    sockobj.listen(5) #limite de 2 clientes
    print('servidor iniciado')

    while True:
        conexao, endereco = sockobj.accept()
        print('Server conectado por', endereco)

        while True:
            data = conexao.recv(1024)
            msg = data.decode('utf-8')
            if not data: break
            print("CLIENTE=>: "+ msg)
            conexao.send(b"SERVIDOR=>"+data)


        conexao.close()

except Exception as e:
    print(e)

input()
