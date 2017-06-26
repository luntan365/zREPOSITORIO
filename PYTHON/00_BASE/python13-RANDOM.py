import random

# numero aleatorio de 0 a 9
print(random.choice(range(10)))

# vogal aleatorio
print(random.choice("aeiou"))

# dia da semana aleatorio aleatorio
print(random.choice(['segunda','terça','quarta','quinta','sexta','sabado','domingo']))

# numero aleatorio de 0 a 9
print(random.randrange(10))

# numero aleatorio de 0 a 9 impares
print(random.randrange(1,10, 2))

# numero aleatorio de 0 a 10
print(random.randint(1,10))

# numero flutuante aleatorio de 0 a 1
print(random.uniform(0,1))


input()
