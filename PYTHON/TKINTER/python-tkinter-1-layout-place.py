
from tkinter import *
janela = Tk()
janela.title("Layout Palce") #titulo da janela
janela.geometry("900x600+50+50") #largura X altura + Xmonitor + Ymonitor
janela["bg"]="#8e44ad" #cor de fundo

lb = Label(janela, text="Layout Palce")
lb.place(x=100, y=100) #Layout escolhe posição na janela

#METODO ALTERAR TEXTO DA LABEL
def bt_click():
    print("clicou")
    lb["text"] = "CLICOU NO BOTAO"

bt = Button(janela, width=20, text="OK!", command=bt_click)
bt.place(x=200, y=200)



janela.mainloop() #iniciar loop da janela
