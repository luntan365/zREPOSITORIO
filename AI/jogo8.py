import random

def inserir_numeros_aleatrios():
    numeros_base = [1,2,3,4,5,6,7,8,' ']     
    numeros = []    
    while len(numeros_base) > 0:
        indice_aleatorio = random.randrange(len(numeros_base))
        numeros.append(numeros_base.pop(indice_aleatorio))
    return numeros
    
def exibir(a):
    print("\n | "+str(a[0])+" | "+str(a[1])+" | "+str(a[2])+" | \n | "+str(a[3])+" | "+str(a[4])+" | "+str(a[5])+" | \n | "+str(a[6])+" | "+str(a[7])+" | "+str(a[8])+" | \n")
    pass
    
def Jogadas_possiveis(array_jogo8):
    index_vazio = array_jogo8.index(' ')
    indices_jogadas = [[1,3], [0,2,4], [1,5], [0,4,6], [1,3,5,7], [2,4,8], [3,7], [4,6,8], [5,7]]
    return indices_jogadas[index_vazio]

def mover(jogo8):
    jogadas = [ jogo8[x] for x in Jogadas_possiveis(jogo8) ]
    num_move = None
    while True:
        print "Mova:", jogadas
        try:
            num_move = input()
            if num_move in jogadas:
                  break
            else:
                pass
        except Exception as e:
            pass    
    index_vazio = jogo8.index(' ')
    index_mover = jogo8.index(num_move)
    jogo8[index_vazio] = jogo8[index_mover]
    jogo8[index_mover] = ' '
    

def conseguiu(jogo8):
    if jogo8[0] == 1 and jogo8[1] == 2 and jogo8[2] == 3 and jogo8[3] == 4 and jogo8[4] == 5 and jogo8[5] == 6 and jogo8[6] == 7 and jogo8[7] == 8 and jogo8[8] == None:
        return True
    else:
        return False
       
    
# inico jogo
jogo = inserir_numeros_aleatrios()
while True:
    exibir(jogo)
    mover(jogo)
    if conseguiu(jogo):
        print("PARABES, VC CONSEGUIU")
        break

# fim jogo

input()
