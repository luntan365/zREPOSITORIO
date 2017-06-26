extends Area2D

var vel = 200
var rotacao = 0
var vida = 2

func _ready():
	add_to_group(game.GRUPO_INIMIGO)
	set_process(true)
	rotacao = rand_range(-3, 3)
	pass

func _process(delta):
	set_pos(get_pos() + Vector2(0, 1) * game.vel_meteoro * delta)
	rotate(rotacao * delta)
	pass
	
func recebe_dano(dano):
	get_node("animacao").play("hit")
	vida -= dano
	if vida < 1:
		game.score += 1
		get_node("explosao").play("explosao")
		game.getCamera().vibrar()
		game.vel_meteoro += 1
		set_process(false)
		remove_from_group(game.GRUPO_INIMIGO)
		get_node("animacao").play("destruido")
	pass
