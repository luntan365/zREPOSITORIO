# import sys
# sys.path.append('pasta')
from pasta import *

# ou

# from pasta.pasta.arquivo import metodo

try:
    x = int(input("insira numero de 1 a 20"))
    if not 1 <= x <= 20:
        raise Exception("Escolha um numero entre 1 e 20")
except Exception as e:
    x = 0
    print(str(e))
finally:
    print(str(x))


try:
    x = int (input ("insira numero de 1 a 20"))
except IndexError:
    print("erro de indice")
except ValueError:
    print("erro de valor")



try:
    x = int (input ("insira numero de 1 a 20"))
except IndexError, ValueError:
    print("erro de indice")
