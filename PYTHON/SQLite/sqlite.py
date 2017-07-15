import sqlite3
import time
import datetime

# seguntos_atual = int(time.time())
# print(seguntos_atual)
# data = str(datetime.datetime.fromtimestamp(seguntos_atual).strftime('%d/%m/%Y %H:%M:%S'))
# print(data)

conexao = sqlite3.connect('banco.db')
con = conexao.cursor()

#CRIAR TABELAS
def criar_db():
    try:
        con.execute('''
        CREATE TABLE `volei` (
    	`id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
    	`nome`	TEXT,
    	`pago`	INTEGER DEFAULT 0);  ''')
    except Exception as e:
        pass
        
#INSERT
def insert(nome):
    con.execute("INSERT INTO volei (nome, pago) VALUES ('%s', %d)" %(nome, 0))
    conexao.commit()
    pass


def update(id, nome):
    con.execute("UPDATE volei SET nome = '%s'  WHERE id = %d" %(nome, id))
    conexao.commit()
    pass

def delete(id):
    con.execute("DELETE FROM volei WHERE id = %d" %(id))
    conexao.commit()
    pass

def select(pago):
    lista = con.execute("SELECT * FROM volei WHERE pago = %d" %(pago)).fetchall()
    print(lista)
    for linha in lista:
        print(linha)
        pass    
    return lista
    pass
    
criar_db()    
insert('Dejota Freitas')
update(1, 'Dejota Stormrage')
delete(2)
select(0)
