import dbm

db = dbm.open('python6-database.db', 'c')
db['pedro'] = 'pedro@gmail.com'
db['joao'] = str(2)

print(len(db))
print(db.keys())
print('pedro' in db)

for key in db:
    print(key.decode())
    print(db[key].decode())
    pass

del db['pedro']
db.close()

# ===============SHELVE===================
import shelve
db = shelve.open('python6-database-shelve.db', 'c')
db['pedro'] = 'pedro@gmail.com'
print(db['pedro'])
db.close()

# ===============PICKLE===================
import pickle
arq = open('python6-database-pickle.txt', 'wb')
li = [0,1,2,3,4,5,6,7,8,9]
pickle.dump(li, arq)
pickle.dumps(li)

class PickeAma():
    def __init__(self, nome):
        self.nome = nome
pickeAma = PickeAma("Dejota")

pickle.dump(pickeAma, arq)
# pickle.dumps()

arq.close()

arq = open('python6-database-pickle.txt', 'rb')

print(pickle.load(arq))
print(pickle.load(arq))

arq.close()
# ===============JSON===================

import json
data ={'nome':'dejota', 'idade': 28}

json_data = json.dumps(data)
print(json_data)
print(type(json_data))

data_dicionario = json.loads(json_data)
print(data_dicionario)
print(type(data_dicionario))



input()
