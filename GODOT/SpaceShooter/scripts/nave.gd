extends Area2D

var vel = 500
var arma
var tiro_simples = preload("res://scripts/classes/armas/tiro_simples.gd")
var tiro_duplo = preload("res://scripts/classes/armas/tiro_duplo.gd")
var tiro_triplo = preload("res://scripts/classes/armas/tiro_triplo.gd")
var armas = [
	tiro_simples.new(self),
	tiro_duplo.new(self),
	tiro_triplo.new(self)
]

func _ready(): #vai ser executado logo de inicio
	set_arma(0)
	add_to_group(game.GRUPO_NAVE)
	set_process(true) #sera um objeto processado

func _process(delta):#delta = manter velocidade igual em qualquer pc
	var d = 0
	var e = 0
	var b = 0
	var c = 0
	if Input.is_action_pressed("direita"):
		d = 1
	if Input.is_action_pressed("esquerda"):
		e = -1
	if Input.is_action_pressed("baixo"):
		b = 1
	if Input.is_action_pressed("cima"):
		c = -1	
		
	#NÃO UTRAPASSAR LIMITES DA  TELA
	if get_pos().x > 640-50: #largura da tela - metade largura da nave
		d = 0
	if get_pos().x < 0+50: #inicio da tela + metade largura da nave
		e = 0
	if get_pos().y > 650-40:
		b = 0
	if get_pos().y < 0+40:
		c = 0
	
	#MOVENDO NAVE
	#direita e esquerda
	set_pos(get_pos() + Vector2(1, 0) * vel * delta * (d + e))
	#cima e baixo
	set_pos(get_pos() + Vector2(0, 1) * vel * delta * (b + c))
	
	#ATIRANDAO
	if Input.is_action_pressed("tiro"):
		arma.dispara(delta)

func set_arma(valor):
	arma = armas[valor]



		


func _on_nave_area_enter( area ):
	if area.is_in_group(game.GRUPO_INIMIGO):
		if area.has_method("recebe_dano"):
			area.recebe_dano(100)
			game.life -= 1
			if game.life < 1:
				queue_free()

