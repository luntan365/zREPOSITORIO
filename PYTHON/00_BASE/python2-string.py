print("========== STRING ==========")
# String simples
s = 'string somples'
print(s)
ss = "string aspas duplas"
print(ss)

# varias linhas
s3 = '''String varias linhas
    aspas simles'''
print(s3)
ss3 = """String varias linhas
    aspas duplas
        cabou"""
print(ss3)


print("========== FATIAMENTO ==========")
s = "Para o Python toda String é uma lista imutavel"
print(s[0]) #pprimeiro caracter
print(s[-1]) #ultimo caracter
print(s[::2]) #com intervalo de 2 caracter
print(s[5:]) #do cinco pra frente
print(s[5:10:]) #do 5 ao 10 caracter
print(s[::-1]) #inverter caracteres


print("========== EDITANDO ==========")
s = "Lista de Caracters"
ss = s.split(' ')
print(ss)

ss = s.replace('de ', '')
print(ss)

print("========== STRING FORMAT ==========")
sf = "{0}, {1} e {2}"
print(sf.format('um', 'dois', 'tres'))

sf2 = "{arg0}, {arg1} e {arg2}"
print(sf2.format(arg2='um', arg0='dois', arg1='tres'))

sf = "{0:3}, {1:>5} e {2:<10}"
print(sf.format(1, 2, 3))

sf = "{0:.10f}, {1:.10f}"
print(sf.format(10, 10))

print("========== TABELA ASCII ==========")
print(chr(100)) #qual caracter q tem id 100
print(ord("a")) #qual id do caracter "a"

# for i in range(123):
#     print("ID:"+str(i)+" => CHAR:"+chr(i))





input()
