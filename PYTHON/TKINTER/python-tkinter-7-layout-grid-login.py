
from tkinter import *
janela = Tk()
janela.title("Layout Pack") #titulo da janela
janela.geometry("300x100+50+50")
janela["bg"]="#8e44ad" #cor de fundo

#METODO ALTERAR TEXTO DA LABEL
def btn_logar():
    if ed1.get()=="dejota" and ed2.get()=="0123":
        print("logou com sucesso")
    else:
        print("usuario ou senha iválidos")

lb1 = Label(janela, text="Usuário")
lb2 = Label(janela, text="Senha")
ed1 = Entry(janela)
ed2 = Entry(janela)
bt1 = Button(janela, text="Login", command=btn_logar)
bt2 = Button(janela, text="Login", command=btn_logar)

lb1.grid(row=1, column=1)
ed1.grid(row=1, column=2)
lb2.grid(row=2, column=1)
ed2.grid(row=2, column=2)
bt1.grid(row=3, column=1, columnspan=2, sticky=NW+SE)
bt2.grid(row=1, column=3, rowspan=3, sticky=NW+SE)





janela.mainloop() #iniciar loop da janela
