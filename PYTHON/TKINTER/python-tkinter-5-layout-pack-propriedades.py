
from tkinter import *
from functools import partial
janela = Tk()
janela.title("Layout Pack") #titulo da janela
janela.geometry("400x400+50+50") #largura X altura + Xmonitor + Ymonitor
janela["bg"]="#8e44ad" #cor de fundo

#METODO ALTERAR TEXTO DA LABEL
def bt_soma():
    if ed1.get().isnumeric() and ed2.get().isnumeric():
        lb["text"] = int(ed1.get())+int(ed2.get())
    else:
        lb["text"] = "insira apenas numerios"


ed1 = Entry(janela)
ed1.pack(fill=BOTH, expand=1)

ed2 = Entry(janela)
ed2.pack(fill=BOTH, expand=1)

bt = Button(janela, width=20, text="SOMAR", command=bt_soma)
bt.pack(fill=BOTH, expand=1)

lb = Label(janela, text="Resultado")
lb.pack(fill=BOTH, expand=1)


janela.mainloop() #iniciar loop da janela
