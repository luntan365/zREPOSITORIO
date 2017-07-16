print("========== FUNCAO ==========")
def soma_dun(var1, var2):
    return var1+var2

def imprimir(var):
    print(var)

imprimir(soma_dun(3, 2))


print("========== ARGUMENTOS VALOR DEFEAULT ==========")
def funcao_defeault(nome="Zé", sobrenome="dedal"):
    print(nome+" "+sobrenome)

funcao_defeault();
funcao_defeault("Antonio");
funcao_defeault(sobrenome="Jose")


print("========== ARGUMENTOS DE ORDEM POSICIONAL ==========")
def cadastro(nome, idade, sexo):
    print("Nome: {}, Idade: {}, Sexo: {}.".format(nome, idade, sexo))

cadastro("Dejota", 28, "MAXO")
cadastro(sexo="MUIER", nome="Tay", idade=22)


print("========== RETORNO MULTIPLO DE VALORES ==========")

def multi_retorn():
    return 1, 2, 3
a, b , c = multi_retorn()
print(a,b,c)

def multicacao_e_par(x, y):
    result = x*y
    epar = ((result % 2)==0)
    return result, epar
num, par = multicacao_e_par(3,3)
print(str(num)+" "+str(par))


print("========== LISTA DE ARGUMENTOS ==========")
def argument_lista(*lista_argumentos):
    for i in lista_argumentos:
        print(i)

argument_lista("dejota", "litt", "jasher", "jardel")


print("========== DICIONARIO DE ARGUMENTOS ==========")
def argument_dicionario(**dicionario_argumentos):
    print(dicionario_argumentos)

argument_dicionario(nome=1, sobrenome=2, idade=4, sexo=5)


print("==========  ==========")
input()
