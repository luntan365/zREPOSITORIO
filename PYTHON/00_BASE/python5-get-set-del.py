class Pessoa(object):
    def __init__(self, nome):
        self._nome = nome
        
    def getNome(self):
        print("OBTENDO")
        return self._nome

    def setNome(self, nome):
        print('ALTERANDO')
        self._nome = nome

    def delNome(self):
        print('DELETANDO')
        del self._nome

    nome = property(getNome, setNome, delNome, 'documentacao da propriedade')

    pass


dj = Pessoa('Dejota')
print(dj.nome)
dj.nome = "Dejota Stormrage"
del dj.nome


# ==========================================================================

class Nome():
    doc = "documentacao da propriedade."
    def __get__(self, instance, dono):
        print("OBTENDO")
        return instance._nome
    def __set__(self, instance, valor):
        print('ALTERANDO')
        instance._nome = valor
    def __delete__(self, instance):
        print('DELETANDO')
        del instance._nome

class PessoaXique(object):
    def __init__(self, nome):
        self._nome = nome
    nome = Nome()

djx = PessoaXique('Dejota')
print(djx.nome)
djx.nome = "Dejota Stormrage"
del djx.nome

input()
