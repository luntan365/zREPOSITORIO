
def Todas_jogadas_possiveis():
    num = [1,2,3,4,5,6,7,8,' ']
    todas_jogadas = []

    for x in range(9):
        for i in range(9):
            jogada = []
            jogada.insert(i, num[x])
            for j in range(9):
                if i == j or j == x:
                    continue
                jogada.insert(j, num[j])
            todas_jogadas.append(jogada)
    return todas_jogadas;

jogadas = Todas_jogadas_possiveis()
for value in jogadas:
    print(value)
    pass
input()
