from tkinter import *



#make the window
root = Tk()
root.title("PI Calculator")
# root.iconbitmap('Pi.ico')
root.geometry("400x250")
#end


#frames
topFrame = Frame(root)
topFrame.grid(row=0, column=4,sticky=N+S+E+W)
botFrame = Frame(root)
botFrame.grid(row=1, column=4,sticky=W)
#end



#for the entry + varibles that shows the equation
equa = ""
equation = StringVar()
calculation = Entry(topFrame, textvariable=equation, width=21,font="Helvetica 26 bold",bg="white")
calculation.pack(side=LEFT)
#end

# functions
def btnPress(num):

        global equa
        equa = equa + str(num)
        equation.set(equa)
def equalPress():
    try:
        global equa
        total = str(eval(equa))
        equation.set(total)
        if equa == "000":
            root.destroy()
    except:
        equa = ""
        equation.set("ERROR")

def btnClear():
    global equa
    equa = ""
    equation.set("")
#end




#buttons
values=[1,2,3,'C',4,5,6,'+',7,8,9,'-',0,  '/', '*','=']



col = 0
row = 1
for txt in values:

        btn = Button(botFrame, text=txt, command=lambda txt=txt:btnPress(txt), height=2, width=10, font="Tahoma",bg="SpringGreen",fg="black")
        btn.grid(row=row, column=col, sticky=N+S+E+W)
        col += 1
        if col == 4:
                col =0
                row +=1
        if row == 2 and col == 4:
                row = 3
                col = 0
        if txt == 'C':
                btnClear = Button(botFrame, text="C", command=btnClear, height=2, width=10, font="Tahoma",bg="SpringGreen",fg="black")
                btnClear.grid(row=1, column=3,sticky=N+S+E+W)
        if txt == '=':
                btnEqual = Button(botFrame, text="=", command=equalPress, height=2, width=10, font="Tahoma",bg="SpringGreen",fg="black")
                btnEqual.grid(row=4, column=3,sticky=N+S+E+W)
#end

root.mainloop()
