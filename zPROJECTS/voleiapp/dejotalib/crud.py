import sqlite3
from threading import Thread

class Crud():
    
    def __init__(self):
        self.conexao = sqlite3.connect('voleidb.db', check_same_thread=False)
        self.cursor = self.conexao.cursor()
        self.criar_db()

    def criar_db(self):
        try:
            self.cursor.execute('''
            CREATE TABLE `volei` (
                `id`	integer NOT NULL PRIMARY KEY AUTOINCREMENT,
                `nome`	TEXT,
                `pagou`	INTEGER);  ''')
        except Exception as e:
            pass
            
    def add_pessoa(self, nome):
        self.cursor.execute("INSERT INTO volei (nome, pagou) VALUES ('%s', %d)" %(nome, 0))
        self.conexao.commit()

    def pagou(self, id_pessoa):
        self.cursor.execute("UPDATE volei SET pagou = '%d'  WHERE id = %d" %(1, id_pessoa))
        self.conexao.commit()
        
    def pagou_async(self, id_pessoa):
        Thread(target=self.pagou, args=(id_pessoa,)).start()

    def pendente(self, id_pessoa):
        self.cursor.execute("UPDATE volei SET pagou = '%d'  WHERE id = %d" %(0, id_pessoa))
        self.conexao.commit()
        
    def pendente_async(self, id_pessoa):
        Thread(target=self.pendente, args=(id_pessoa,)).start()

    def resetar_lista(self):
        self.cursor.execute("UPDATE volei SET pagou = 0")
        self.conexao.commit()

    def remover_pessoa(self, id_pessoa):
        self.cursor.execute("DELETE FROM volei WHERE id = %d" %(id_pessoa))
        self.conexao.commit()

    def remover_pessoa_async(self, id_pessoa):
        Thread(target=self.remover_pessoa, args=(id_pessoa,)).start()

    def listar(self, pagou):
        resultado = self.cursor.execute("SELECT id, nome FROM volei WHERE pagou = %d ORDER BY nome ASC" %(pagou))
        return resultado.fetchall()

    def listar_todos(self):
        resultado = self.cursor.execute("SELECT id, nome FROM volei ORDER BY nome")
        return resultado.fetchall()
