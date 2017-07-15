from kivy.storage.jsonstore import JsonStore

# class kivy.storage.jsonstore.JsonStore(filename, indent=None, sort_keys=False, **kwargs)
store = JsonStore('JsonStore.json', sort_keys=True)

# salvando valores
store.put('tito', name='Mathieu', org='kivy')
store.put('tshirtman', name='Gabriel', age=27)

# subistituindo valor
store.put('tito', name='Mathieu', age=30)

# recuperando valor
print('tito is', store.get('tito')['age'])

# verificanco se existe
if store.exists('tito'):
    print('tite exists:', store.get('tito'))

# deletando valor
store.delete('tito')

# trz todas ocorrencia em que nome é igual Gabriel
for item in store.find(name='Gabriel'):
    print('tshirtmans index key is', item[0])
    print('his key value pairs are', str(item[1]))

entries = list(store.find(name='Mathieu')) #pode ser usado convertido em uma lista

store.clear() # Limpe todo o armazenamento.
store.count() # Retorna o número de entradas armazenadas.
store.keys() #Retorna uma lista com todas as chaves armazenadas.

# ==========================================================
# ASSINCRONA
# se definir o callback a funcao torna se assincrona

def my_callback(store, key, result):
    print('the key', key, 'has a value of', result)
    
mystore.get('plop', callback=my_callback)
