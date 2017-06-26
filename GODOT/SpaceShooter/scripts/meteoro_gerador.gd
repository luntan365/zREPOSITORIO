extends Node


var pl_meteoro = preload("res://scenes/meteoro.tscn")
var intervalo = 2

func _ready():
	set_process(true)
	pass
	
func _process(delta):
	
	if intervalo > 0:
		intervalo -= delta
	else:
		intervalo = rand_range(0.3 , 1.3)
		var meteoro = pl_meteoro.instance()
		meteoro.set_pos(Vector2(rand_range(30, 610), -40))
		get_owner().add_child(meteoro)
	
	pass