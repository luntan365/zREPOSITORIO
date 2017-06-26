
import sys
print(sys.platform) # qual os estao sendo executado
print(sys.exc_info()) # ultimo erro encontrado

import os
print(os.getcwd()) # diretorio
print(os.mkdir('pasta')) # cria diretorio
print(os.rmdir('pasta')) # apaga diretorio
print(os.listdir()) # lista diretorios


print(os.path.isdir('pasta')) # verificar se é diretorio
print(os.path.isfile('arquivo.txt')) # verificar se é arquivo
print(os.path.exists('python8-sys-os.py')) #verificar se existe diretorio ou arquivo
print(os.path.getsize('python8-sys-os.py')) # olha o tamanho Byts
print(os.path.split('D:\zGitHub\zREPOSITORIO\PYTHON\00_BASE\python8-sys-os.py')) #separa diretorio e arquivos
print(os.path.splitext('python8-sys-os.py')) #separa nome e extensa

print(os.path.abspath('python8-sys-os.py'))
print(os.path.abspath(''))
print(os.path.abspath('.'))
print(os.path.abspath('..'))

# os.rename('nome_arquivo.txt', 'novo_nome_arquivo.txt') #renomeia arquivos
# os.remove('novo_nome_arquivo.txt') #apaga arquivo



# OLHAR TODOS DORETORIO E SUBDOORETORIOS
def varrer_diretorio(dir):
    for (nome, subdiretorio, arquivos) in os.walk(dir):
        print('DIRETORIO: '+nome)
        for fnome in arquivos:
            print('-->',os.path.join(nome,fnome))
            pass
varrer_diretorio('.')

input()
