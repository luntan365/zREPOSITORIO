
# raça com seus bonus e penalidades
RACA = [humano, orc, elfo, morto-vivo, anao]

# classe com 3 arvores doferente pra seguir
CLASSES = [guerreiro, mago, arqueiro, paladino] 

#armaduras elementais 
ELEMENTO = [neutro, luz, sombra, agua, terra, fogo, vento, trovao, gelo]

# tipos de armas e magias
PROPRIEDADE_ATAQUE = [comum, cortante, perfurante, esmagante]

# propiedades das armaduras
PROPRIEDADE_DEFESA = [comum, dura, resiliente, impermeavel]

#tipos de danos
TIPOS ATAQUE = [Ataque Fisico, Ataque Magico]

STR
DEX
INT
AGI
VIT
ESP

# Atributos
NIVEL
HP = (base + VIT * ? + STR)
SP = (base + ESP * ? + INT)
PRECISAO = (random 0 ~ atual)
ESQUIVA = (random 0 ~ atual)
ATAQUE = (DEX + (random(STR - DEX)))
ATAQUE_MAGICO = (DEX + (random(INT - DEX)))
DEFESA (VIT - % da armadura)
DEFESA_MAGICO (INT - % da armadura)
VELOCIDADE_ATAQUE (tempo = tempo fixo + (if > 0 ? tempo arma - V_A) : 0)
VELOCIDADE_CONJURACAO (tempo = tempo fixo + (if > 0 ? tempo magia - V_C) : 0)

#RUNAS
+ Atributos
+ Dano algum elemento
+ dano tipo de ataque

# mapas com monstros e boss, dungeos, e rides
# missoes 
