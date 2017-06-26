extends Area2D

var vel = 900
var dano = 1

func _ready():
	get_node("audio").play("tiro")
	set_process(true)
	pass

func _process(delta):
	set_pos(get_pos() + Vector2(0, -1) * vel * delta)	
	
	if get_pos().y < -30: #quando tiro sair da tela sera destruido
		queue_free() #entra na fila pra ser apagado	
	pass #fim metodo process

func _on_tiro_area_enter( area ):
	if area.is_in_group(game.GRUPO_INIMIGO):
		if area.has_method("recebe_dano"):
			area.recebe_dano(dano)
		else:
			area.queue_free()
		queue_free()
	pass
