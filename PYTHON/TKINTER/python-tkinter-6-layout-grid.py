
from tkinter import *
janela = Tk()
janela.title("Layout Pack") #titulo da janela
janela["bg"]="#8e44ad" #cor de fundo

#METODO ALTERAR TEXTO DA LABEL
def bt_soma():
    if ed1.get().isnumeric() and ed2.get().isnumeric():
        lb["text"] = int(ed1.get())+int(ed2.get())
    else:
        lb["text"] = "insira apenas numerios"


ed1 = Entry(janela)
ed1.grid(row=1, column=1)

ed2 = Entry(janela)
ed2.grid(row=2, column=2)

bt = Button(janela, width=20, text="SOMAR", command=bt_soma)
bt.grid(row=3, column=3)

lb = Label(janela, text="Resultado")
lb.grid(row=4, column=4)



janela.mainloop() #iniciar loop da janela
