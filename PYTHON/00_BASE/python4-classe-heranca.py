# RECOMENDADO Q AS CLASSES HERDEM DE OBJECT
class ObjetoPai(object):

    __atributo_privado_estatico = "Privado Estatico"

    def __init__(self, nome="Dejota", idade=28): #CONSTRUTOR

        self.__atributo_privado = "Privado"

        self.nome = nome
        self.idade = idade
        print('constutor pai')

    # todo metodo usa SELF para referenciar o bojeto que esta chamando
    def printo(self):
        print(self.nome+" - "+str(self.idade))
        pass

    # metodo estaticonao tem SELF, e é acesssado com NomeDaClasse.metodo_estatico()
    @staticmethod
    def metodo_estatico():
        print("Metodo estático")
        pass

    def __metodo_privado(self):
        print("Metodo privado")
        pass

    def get_atributo_metodo_privado(self):
        print(self.__atributo_privado);
        self.__metodo_privado()

    def get_atributo_privado_estatico():
        print(ObjetoPai.__atributo_privado_estatico);

    def __str__(self):
        return 'Metodo toString'

    # caixo queira chamar instancia execute algo
    def __call__(self, variavel):
        print("__call__ executou: "+str(variavel))

    # SOMAR (ob1 + obj2) objetos, __sub__,  __mult__, __div__
    def __add__(self, other):
        self.idade += other.idade

o = ObjetoPai('Joao')
o.printo()
o.get_atributo_metodo_privado()
ObjetoPai.metodo_estatico()
ObjetoPai.get_atributo_privado_estatico()
o(123456) #metodo __call__ chamado
print()

# ====================HERANÇA COM PARAMENTROS ORDENADOS==============================

class ObjetoFilho(ObjetoPai):
    def __init__(self, sexo, *args):
        self.sexo = sexo
        super(ObjetoFilho, self).__init__(*args)
        print('constutor filho')

    def printo(self):
        print(self.nome+" - "+str(self.idade)+" - "+str(self.sexo))
        pass

of = ObjetoFilho('Femenino','Maria', 23)
of.printo()

# =======================HERANÇA COM PARAMENTROS NOMEADOS===========================

class ObjetoBastardo(ObjetoPai):
    def __init__(self, **args):
        super(ObjetoBastardo, self).__init__(**args)
        print('constutor bastardo')

    def printo(self):
        print(self.nome+" - "+str(self.idade))
        pass

ob = ObjetoBastardo(nome='JOSE', idade=26)
ob.printo()

class HerancaMultipla(ObjetoFilho, ObjetoBastardo):
    def __init__(sexo, **args):
        ObjetoFilho.__init__(self, **args)
        ObjetoBastardo.__init__(self, **args)
    pass

# Verificando se é subclasse
print(issubclass(ObjetoFilho, ObjetoPai))

# veririficar se metodo ou classe pode ser chamado
print(callable(ObjetoPai))
print(callable(ObjetoPai().printo))



# comparando objetos usando metodos
# __eq__ : x == y
# __ne__ : x != y
# __le__ : x <= y
# __ge__ : x >= y
# __lt__ : x < y
# __ne__ : x > y

# def __eq__(self, other):
#     return self.id == other.id


input()
