from random import randint
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))
print(randint(0,3))

NIVEL = 1
STR = 0
DEX = 0
CON = 0
AGI = 0
VIT = 0
ESP = 0

HP = (10 + VIT * 3 + STR)
SP = (10 + ESP * 3 + CON)

PRECISAO = DEX  # (random 0 ~ atual)
ESQUIVA = AGI   # (random 0 ~ atual)

ATAQUE_MIN_CAC = DEX
ATAQUE_MAX_CAC = DEX+STR*2

ATAQUE_MIN_ADS = DEX
ATAQUE_MAX_ADS = DEX, DEX*2+STR

ATAQUE_MIN_MAGICO = DEX
ATAQUE_MAX_MAGICO = DEX+CON*2

DEFESA = 10 # armadura %
DEFESA_RANDOM = VIT

DEFESA_MAGICO = 10 # armadura %
DEFESA_MAGICO_RANDOM = CON

VELOCIDADE_ATAQUE = DEX + STR + AGI * 2
VELOCIDADE_CONJURACAO = ESP + CON + DEX * 2

# TEMPO = 1 + tempo_arma / VELOCIDADE_ATAQUE
# TEMPO = 1 + tempo magia / VELOCIDADE_CONJURACAO

RESISTENCIA_FISICA = STR + VIT*2
RESISTENCIA_MAGICA = CON + ESP*2


input()
