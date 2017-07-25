import socket
# AF_INET = IPV4 , AF_INET6 = IPV6
# SOCK_STREAM = TCP/IP , SOCK_DGRAM = UDP
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

host = "127.0.0.1"
porta = 8291

mensagem = "mensagem enviada pelo servidor"

s.bind((host, porta))
s.listen(1) #NUMERO MAXIMO DE CONEXAO AO MESMO TEMPO

while True:
    conexao, endereco = s.accept() # ACEITANDO CONEXAO
    print("Conectado com ", endereco)
    conexao.send(mensagem.encode('ascii'))  # ENVIANDO MENSAGEM EM BYTES 
    conexao.close()  # FECHANDO CONEXAO 
    pass
