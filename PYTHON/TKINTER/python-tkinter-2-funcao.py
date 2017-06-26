
from tkinter import *
from functools import partial
janela = Tk()
janela.title("Layout Palce") #titulo da janela
janela.geometry("900x600+50+50") #largura X altura + Xmonitor + Ymonitor
janela["bg"]="#8e44ad" #cor de fundo

#METODO ALTERAR TEXTO DA LABEL
def bt_click(texto):
    lb["text"] = texto +" "+ ed.get()

ed = Entry(janela)
ed.place(x=200, y=50)

lb = Label(janela, text="label em branco")
lb.place(x=200, y=100) #Layout escolhe posição na janela

bt1 = Button(janela, width=20, text="BUTTON 01")
bt1.place(x=200, y=200)
bt1["command"] = partial(bt_click, bt1["text"])

bt2 = Button(janela, width=20, text="BUTTON 02")
bt2.place(x=200, y=300)
bt2["command"] = partial(bt_click, bt2["text"])


janela.mainloop() #iniciar loop da janela
