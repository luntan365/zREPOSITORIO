kivy.vector.Vector(*largs)
# Vector representa um vetor 2D (x, y)

v = Vector(12, 23)
v.x # = 12
v.y # = 23


#OPERACOES
>>> Vector(1, 1) + Vector(9, 5)
[10, 6]
>>> Vector(9, 5) - Vector(5, 5)
[4, 0]
>>> Vector(10, 10) / Vector(2., 4.)
[5.0, 2.5]
>>> Vector(10, 10) / 5.
[2.0, 2.0]
>>> v = Vector(1, 1)
>>> v += 2
>>> v
[3, 3]
>>> v *= 5
[15, 15]
>>> v /= 2.
[7.5, 7.5]

#Angulo
>>> Vector(100, 0).angle((0, 100))
-90.0
>>> Vector(87, 23).angle((-77, 10))
-157.7920283010705
>>> v = Vector(100, 0)
>>> v.rotate(45)
[70.710678118654755, 70.710678118654741]

# DISTANCIA
Vector(10, 10).distance((5, 10))
5.
>>> a = (90, 33)
>>> b = (76, 34)
>>> Vector(a).distance(b)
14.035668847618199

# comprimento do Vetor
>>> Vector(10, 10).length()
14.142135623730951

# Localiza o ponto de intersecção entre as linhas (1) v1->v2 e (2) v3->v4
>>> a = (98, 28)
>>> b = (72, 33)
>>> c = (10, -5)
>>> d = (20, 88)
>>> Vector.line_intersection(a, b, c, d)
[15.25931928687196, 43.911669367909241]

# Localiza o ponto de intersecção entre os segmentos (1) v1->v2 e (2) v3->v4
>>> a = (0, 0)
>>> b = (10, 10)
>>> c = (0, 10)
>>> d = (10, 0)
>>> Vector.segment_intersection(a, b, c, d)
[5, 5]
