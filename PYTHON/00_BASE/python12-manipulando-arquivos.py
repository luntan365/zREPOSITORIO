# ADD CONTEUDO NO FINAL DO ARQUIVO E CRIA ARQUIVO SE NAO EXISTIR ARQUIVO
try:
    arq = open('main1-manipulando-arquivos.txt', 'a')
    arq.write('escrendo no arquivo\n')
except Exception as e:
    print(e)
finally:
    arq.close()

# LER ARQUIVO
try:
    arq = open('arquivo.txt')
    # texto=arq.read() # ler todo conteudo
    # texto=arq.readline()  # ler ate encontrar o \n
    texto=arq.readlines() # ler todas linha e cooloca numa lista

    for i in texto:
        print(i.strip()) #strip() remove espaços vazios ao inicio e fim da string

except Exception as e:
    print(e)
finally:
    arq.close()

# CRIAR OU SUBSTITUIR E ESCREVER ARQUIVO
# try:
#     arq = open('arquivo.txt', 'w') #r = cria novo arquivo ou subistitui se existir
#     arq.write('escrendo no arquivo') #escreve no arquivo
#     arq.close()
# except Exception as e:
#     print(e)


# CONVERTER LISTA EM TEXTO E TEXTO EM LISTA
# try:
#     arq = open('arquivo.txt', 'a')
#     ler = open('arquivo.txt')
#     arq.write(str(list(range(10)))+'\n')
#     lista = eval(ler.readline())
#     print(type(lista))
# except Exception as e:
#     print(e)
# finally:
#     arq.close()
#     ler.close()

# FAZ COPIA DO ARQUIVO IGNORANDO LINHAS COMENTADAS COM #
# def filtraArquivo(velhoArquivo, novoArquivo):
#   f1 = open(velhoArquivo, "r")
#   f2 = open(novoArquivo, "w")
#   while 1:
#       texto = f1.readline()
#       if texto == "":
#           break
#       if texto[0] == '#':
#           continue
#       f2.write(texto)
#   f1.close()
#   f2.close()
#   return


# VERIFICAR SE ARQUIVO EXISTE
# def existe(nomedoarquivo)
#   try:
#     f = open(nomedoarquivo)
#     f.close()
#     return 1
#   except:
#     return 0


input()
