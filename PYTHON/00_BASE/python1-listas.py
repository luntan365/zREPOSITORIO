try:
    for i in "Dejota":
        print(i)

    print("========== LISTAS ==========")
    lista = [0, "2", True]
    print(lista)
    for i in range(len(lista)):
        print(lista[i])

    print("========== LISTAS BIDIMENSIONAL ==========")
    lista_bidimnsional = [[0, "2", True, "s"], [0, "2", True], [0, "2", True]]
    for i in range(len(lista_bidimnsional)):
        for j in range(len(lista_bidimnsional[i])):
            print(lista_bidimnsional[i][j])

    print("========== CONCATENACAO DE LISTAS ==========")
    lista_somada = [0,1,2,3,4] + [5,6,7,8,9]
    print(lista_somada)


    print("========== ADD ELEMENTO LISTA ==========")
    lista_add = []
    lista_add.insert(0, "primeiro") #inserir na posição desejada
    lista_add.append(0)  #inserir no final da lista
    print(lista_add)
    lista_add.append('elemento')
    lista_add.append([1,2,3])
    lista_add += [100,200,300]
    lista_add += 2*[666]
    print(lista_add)
    print(100*"-")


    print("========== REMOVE ELEMENTO LISTA ==========")
    lista_add.pop() #remove do final da lista
    lista_add.pop(2) #remove do posição desejada
    del(lista_add[0]) #remover na posição desejada
    del(lista_add[-1]) #-1 remove ultimo Elemento da lista
    del(lista_add[::3]) #removendo com intervalo de 3
    print(lista_add)
    lista_add.clear() #limpa a lista
    print(lista_add)


    print("========== PERCORRER ITENS LISTA = FOREACH ==========")
    lista_percorrer = [100, 200, 300]

    for valor in lista_percorrer:
        valor += 1 #conteudo não sofre alteração
    print(lista_percorrer)

    for i in range(len(lista_percorrer)):
        lista_percorrer[i] += 1 #conteudo alterrado
    print(lista_percorrer)

    for index, valor in enumerate(lista_percorrer):
        lista_percorrer[index] += 1 #conteudo alterrado
    print(lista_percorrer)


    print("========== IMPRIMIR LISTA ==========")
    nome = "Dejota imprimindo lista loucamente"
    # lista[inicio:fim:intervalo]
    print(nome[0])
    print(nome[0:len(nome)])
    print(nome[::-1]) #imprimir de traz pra frente
    print(nome[6::2]) #imprimir com intervelo de dois elementos


    print("========== FUNÇÔES LISTA ==========")
    lista = ["lano", "piaba", "goias", "Farinha", "Ferruge", "Morcego", "Berserk", "lano"]

    print(lista)
    lista.reverse() #inverte
    print(lista)

    lista.sort() #ordena
    print(lista)

    lista.sort(reverse=True) #ordena decrescente
    print(lista)

    print(lista.index("Farinha"))  #retornar indice da primeira occorrencia do elemento
    print(lista.count("lano")) #retorna a quantidade de ocorrencias desse elemento


    print("========== TUPLA = LISTA IMULTAVEL ==========")
    #NAÕ É POSSIVEL ALTERAR, ADICIONAR OU REMOVER ELEMENTO DE UMA TUPLA
    t = ("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado")
    print(type(t))
    print(t)
    t = (1,2,3)
    print(t)
    t = "sss", 1, True
    print(t)


    print("========== DICIONARIOS ==========")
    #dicionario tem uma CHAVE e um VALORestá sempre entre {}
    d = {}
    print(type(d))
    d["key1"] = "Valor1"
    d["bollean"] = True
    d["num"] = 127
    print(d)
    print(d.get("key1")) #retorna valor associado a essa chave
    del(d["bollean"]) #deleta valor associado a essa chave
    print(d.keys()) #lista de chaves do DICIONARIOS
    print(d.values()) #lista de valores do DICIONARIOS
    print(d.popitem()) # retorna e remove o primeiro elemento do dicionario
    d.update({"dejota":185444, "tay":545448}) #add todo elementos de um dicionario a outro







    print("==========  ==========")
except Exception as e:
    print(str(e))
input()
